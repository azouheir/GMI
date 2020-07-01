<?php		
	function PerfRAM_node($id,$val,$total){
		$prct=($val*100)/$total;
		$prct=round($prct);
		$val=round($val,2);
		echo "
		<li class='chart__bar' style='width: $prct%;background: linear-gradient(to left, #FFB869, #FF8E69);'>
          <span class='chart__label' style='color: #61553D;'>
            <a data-toggle='tooltip' title='$val Go' style='text-decoration: none;color: #61553D;'>$id</a>
          </span>
        </li>";
	}
if(isset($_SESSION['var'])){
	$con=mysqli_connect('localhost','root','','GMI');
	
	if ($_SESSION['var']=='zone') {
  		$res=$con->query("SELECT sum(cap_ram) FROM node");
	$row=$res->fetch_row();
    if ($row) {
	$res->data_seek(0);
	while ($row=$res->fetch_row()) {
		$somme=$row[0];
		$res1=$con->query("SELECT c.id_cluster,SUM(n.cap_ram) 
							FROM cluster c JOIN node n 
							USING(id_cluster) 
							GROUP BY c.id_cluster");
		while ($row1=$res1->fetch_row()) {
			PerfRAM_node($row1[0],$row1[1],$somme);
		}
	}}
	}
	$idd=$_SESSION['var'];
	$res=$con->query("SELECT sum(n.cap_ram) 
					  FROM cluster c JOIN node n 
				      USING(id_cluster)
					  WHERE c.id_cluster='$idd' GROUP BY c.id_cluster");
	$row=$res->fetch_row();
    if ($row) {
	$res->data_seek(0);
	while ($row=$res->fetch_row()) {
		$somme=$row[0];
		$res1=$con->query("SELECT n.id_node,SUM(n.cap_ram) 
							FROM cluster c JOIN node n 
							USING(id_cluster) 
							WHERE c.id_cluster='$idd'
							GROUP BY c.id_cluster,n.id_node");
		while ($row1=$res1->fetch_row()) {
			PerfRAM_node($row1[0],$row1[1],$somme);
		}
	}}
	

	$res=$con->query("SELECT sum(n.cap_ram) FROM rack r JOIN node n ON(r.id_rack=n.id_rack)
						WHERE r.id_rack='$idd' GROUP BY r.id_rack");
	$row=$res->fetch_row();
    if ($row) {
	$res->data_seek(0);
	while ($row=$res->fetch_row()) {
		$somme=$row[0];
		$res1=$con->query("SELECT n.id_node,SUM(n.cap_ram) 
							FROM rack r JOIN node n ON(r.id_rack=n.id_rack)
							WHERE r.id_rack='$idd'
							GROUP BY r.id_rack,n.id_node");
		while ($row1=$res1->fetch_row()) {
			PerfRAM_node($row1[0],$row1[1],$somme);
		}
	}}
}