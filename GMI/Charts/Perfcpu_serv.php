<?php		
	function PerfCPU_Serv($id,$val,$total){
		$prct=($val*100)/$total;
		$prct=round($prct);
		$val=round($val,2);
		echo "
		<li class='chart__bar' style='width: $prct%;background: linear-gradient(to left, #99E5FF, #999BFF);'>
          <span class='chart__label' style='color: #61553D;'>
           <a data-toggle='tooltip' title='$val Ghz' style='text-decoration: none;color: #61553D;'>$id</a>
          </span>
        </li>";
	}

	if (isset($_SESSION['var'])) {
		$idd=$_SESSION['var'];

		$con=mysqli_connect('localhost','root','','GMI');
		if ($_SESSION['var']=='zone') {
	$res=$con->query("SELECT SUM(freq_cpu) FROM cluster JOIN serveur USING(id_cluster)");
	$row=$res->fetch_row();
    if ($row) {
	$res->data_seek(0);
	while ($row=$res->fetch_row()) {
		$somme=$row[0];
		$res1=$con->query("SELECT id_cluster,SUM(freq_cpu) FROM cluster JOIN serveur USING(id_cluster) GROUP BY id_cluster");
		while ($row1=$res1->fetch_row()) {
			PerfCPU_Serv($row1[0],$row1[1],$somme);
		}
	}}
    }

    $res=$con->query("SELECT sum(s.freq_cpu) FROM cluster c JOIN serveur s ON(c.id_cluster=s.id_cluster)
						WHERE c.id_cluster='$idd' GROUP BY c.id_cluster");
	$row=$res->fetch_row();
    if ($row) {
	$res->data_seek(0);
	while ($row=$res->fetch_row()) {
		$somme=$row[0];
		$res1=$con->query("SELECT s.id_serveur,SUM(s.freq_cpu) 
							FROM cluster c JOIN serveur s 
							ON(c.id_cluster=s.id_cluster)
							WHERE c.id_cluster='$idd' 
							GROUP BY c.id_cluster,s.id_serveur");
		while ($row1=$res1->fetch_row()) {
			PerfCPU_Serv($row1[0],$row1[1],$somme);
		}
	}}
}