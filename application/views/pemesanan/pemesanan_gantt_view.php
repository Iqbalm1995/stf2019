		
	    <!-- helper libraries -->
	    <script src="<?php echo base_url('asset/');?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
	    <!-- daypilot libraries -->
	    <script src="<?php echo base_url('asset/');?>js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
	    <div class="container-fluid">

	    	<!-- Page Heading -->
	        <h1 class="h3 mb-2 text-gray-800">Gantt Chart Pemesanan ID. <?=$nomor_pesanan?></h1>
	        <hr>
	        <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
	        <!-- <a class="btn btn-primary" href="<?php echo base_url('pemesanan/'); ?>">Kembali</a> -->
	        
	        <div class="card shadow mb-4 mt-2">
	        	<div class="card-header py-3">
	            	<h6 class="m-0 font-weight-bold text-primary">Gantt Chart Pemesanan</h6>
	            </div>
	            <div class="col-md-12 card-body">
	            	<div id="dp"></div>
	            </div>
	        </div>

	    </div>

	    <script>
	      var today = new Date();
		  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		  var dp = new DayPilot.Gantt("dp");

		  dp.startDate = new DayPilot.Date();
		  dp.days = 30;

		  dp.linkBottomMargin = 5;

		  dp.rowCreateHandling = 'Enabled';

		  dp.columns = [
		    { title: "Name", property: "text", width: 100},
		    { title: "Duration", width: 100}
		  ];

		  dp.onBeforeRowHeaderRender = function(args) {
		    args.row.columns[1].html = args.task.duration().toString("d") + " days";
		    args.row.areas = [
		      {
		        right: 3,
		        top: 3,
		        width: 16,
		        height: 16,
		        style: "cursor: pointer; box-sizing: border-box; background: white; border: 1px solid #ccc; background-repeat: no-repeat; background-position: center center; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAABASURBVChTYxg4wAjE0kC8AoiFQAJYwFcgjocwGRiMgPgdEP9HwyBFDkCMAtAVY1UEAzDFeBXBAEgxQUWUAgYGAEurD5Y3/iOAAAAAAElFTkSuQmCC);",
		        action: "ContextMenu",
		        menu: taskMenu,
		        v: "Hover"
		      }
		    ];
		  };

		  dp.init();

		  loadTasks();
		  loadLinks();

		  function loadTasks() {
		    $.post("<?=base_url('gantt/')?>backend_tasks.php?nomor_pesanan=<?=$nomor_pesanan?>", function(data) {
		      dp.tasks.list = data;
		      dp.update();
		    });
		  }

		  function loadLinks() {
		    $.post("<?=base_url('gantt/')?>backend_links.php", function(data) {
		      dp.links.list = data;
		      dp.update();
		    });
		  }

		  var taskMenu = new DayPilot.Menu();
		</script>
