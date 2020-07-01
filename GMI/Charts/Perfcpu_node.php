<!-- SELECT c.id_cluster,s.id_serveur,n.id_node ,SUM(n.freq_cpu) FROM cluster c JOIN serveur s JOIN node n ON(c.id_cluster=s.id_cluster and s.id_serveur=n.id_serveur) GROUP BY c.id_cluster,s.id_serveur,n.id_node -->
<?php		
	function PerfCPU_node($id,$val,$total){
		$prct=($val*100)/$total;
		$prct=round($prct);
		$val=round($val,2);
		echo "
		<li class='chart__bar' style='width: $prct%;background: linear-gradient(to left, #FFB869, #FF8E69);'>
          <span class='chart__label' style='color: #61553D;'>
            <a data-toggle='tooltip' title='$val Ghz' style='text-decoration: none;color: #61553D;'>$id</a>
          </span>
        </li>";
	}
if(isset($_SESSION['var'])){
	$con=mysqli_connect('localhost','root','','GMI');
	
	if ($_SESSION['var']=='zone') {
  		$res=$con->query("SELECT sum(freq_cpu) FROM node");
	$row=$res->fetch_row();
    if ($row) {
	$res->data_seek(0);
	while ($row=$res->fetch_row()) {
		$somme=$row[0];
		$res1=$con->query("SELECT c.id_cluster,SUM(n.freq_cpu) 
							FROM cluster c JOIN node n 
							USING(id_cluster) 
							GROUP BY c.id_cluster");
		while ($row1=$res1->fetch_row()) {
			PerfCPU_node($row1[0],$row1[1],$somme);
		}
	}}
	}
	$idd=$_SESSION['var'];

	$res=$con->query("SELECT sum(n.freq_cpu) FROM cluster c JOIN node n USING(id_cluster)
						WHERE c.id_cluster='$idd' GROUP BY c.id_cluster");
	$row=$res->fetch_row();
    if ($row) {
	$res->data_seek(0);
	while ($row=$res->fetch_row()) {
		$somme=$row[0];
		$res1=$con->query("SELECT n.id_node,SUM(n.freq_cpu) 
							FROM cluster c JOIN node n 
							USING(id_cluster)
							WHERE c.id_cluster='$idd' 
							GROUP BY c.id_cluster,n.id_node");
		while ($row1=$res1->fetch_row()) {
			PerfCPU_node($row1[0],$row1[1],$somme);
		}
	}}

	$res=$con->query("SELECT sum(n.freq_cpu) FROM rack r JOIN node n ON(r.id_rack=n.id_rack)
						WHERE r.id_rack='$idd' GROUP BY r.id_rack");
	$row=$res->fetch_row();
    if ($row) {
	$res->data_seek(0);
	while ($row=$res->fetch_row()) {
		$somme=$row[0];
		$res1=$con->query("SELECT n.id_node,SUM(n.freq_cpu) 
							FROM rack r JOIN node n ON(r.id_rack=n.id_rack)
							WHERE r.id_rack='$idd'
							GROUP BY r.id_rack,n.id_node");
		while ($row1=$res1->fetch_row()) {
			PerfCPU_node($row1[0],$row1[1],$somme);
		}
	}}



}