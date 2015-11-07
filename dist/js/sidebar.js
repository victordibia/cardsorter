$(document).ready(function() {
 var path = window.location.pathname;
 var page = path.split("/").pop();
 console.log( page );
 
	if (page == "" | page == "index.php" ){
		$("treeview").removeClass("active");
		$("#index").addClass("active");
	}else if (page == "codes.php" ){
		$("treeview").removeClass("active");
		$("#codebook").addClass("active");
	}else if (page == "training.php" ){
		$("treeview").removeClass("active");
		$("#training").addClass("active");
	}else if (page == "tasks.php" ){
		$("treeview").removeClass("active");
		$("#tasks").addClass("active");
	}
});