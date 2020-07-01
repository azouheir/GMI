<?php		
	function PerfSSD_node($id,$val,$total){
		$prct=($val*100)/$total;
		$prct=round($prct);
		$val=round($val,2);
		echo "
		<li class='chart__bar' style='width: $prct%;background: linear-gradient(to left, #FFB869, #FF8E69);'>
          <span class='chart__label'>
            <a data-toggle='tooltip' title='$val Go' style='text-decoration: none;color: #61553D;'>$id</a>
          </span>
        </li>";
	}
if(isset($_SESSION['var'])){
	$con=mysqli_connect('localhost','root','','GMI');
	
	if ($_SESSION['var']=='zone') {
  		$res=$con->query("SELECT sum(cap_stockage) FROM ssd");
	$row=$res->fetch_row();
    if ($row) {
	$res->data_seek(0);
	while ($row=$res->fetch_row()) {
		$somme=$row[0];
		$res1=$con->query("SELECT c.id_cluster,SUM(ss.cap_stockage) 
							FROM cluster c JOIN node n JOIN ssd ss ON(c.id_cluster=n.id_cluster and ss.id_node=n.id_node) 
							GROUP BY c.id_cluster
							ORDER BY SUM(ss.cap_stockage)");
		while ($row1=$res1->fetch_row()) {
			PerfSSD_node($row1[0],$row1[1],$somme);
		}
	}}
	}
	$idd=$_SESSION['var'];
	$res=$con->query("SELECT sum(ss.cap_stockage) FROM cluster c JOIN node n JOIN ssd ss ON(c.id_cluster=n.id_cluster and ss.id_node=n.id_node)
						WHERE c.id_cluster='$idd' GROUP BY c.id_cluster");
	$row=$res->fetch_row();
    if ($row) {
	$res->data_seek(0);
	while ($row=$res->fetch_row()) {
		$somme=$row[0];
		$res1=$con->query("SELECT n.id_node,SUM(ss.cap_stockage) 
							FROM cluster c JOIN node n JOIN ssd ss ON(c.id_cluster=n.id_cluster and ss.id_node=n.id_node) 
							WHERE c.id_cluster='$idd'
							GROUP BY c.id_cluster,n.id_node
							ORDER BY SUM(ss.cap_stockage)");
		while ($row1=$res1->fetch_row()) {
			PerfSSD_node($row1[0],$row1[1],$somme);
		}
	}}

	$res=$con->query("SELECT sum(ss.cap_stockage) FROM rack r JOIN node n JOIN ssd ss ON(r.id_rack=n.id_rack and  ss.id_node=n.id_node)
					  WHERE r.id_rack='$idd' 
					  GROUP BY r.id_rack");
	$row=$res->fetch_row();
    if ($row) {
	$res->data_seek(0);
	while ($row=$res->fetch_row()) {
		$somme=$row[0];
		$res1=$con->query("SELECT n.id_node,SUM(ss.cap_stockage) 
							FROM rack r JOIN node n JOIN ssd ss
							ON(r.id_rack=n.id_rack and  ss.id_node=n.id_node)
							WHERE r.id_rack='$idd' 
							GROUP BY r.id_rack,n.id_node
							ORDER BY SUM(ss.cap_stockage)");
		while ($row1=$res1->fetch_row()) {
			PerfSSD_node($row1[0],$row1[1],$somme);
		}
	}}
}