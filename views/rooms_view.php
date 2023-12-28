<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-white">
<table id="myTable" border="1" cellpadding="5" cellspacing="0" width="100%" class="display">
    <!-- <tbody>
        //<?php
            //while($room = $rw->fetch_assoc()){
          //      echo("
             //   <tr class='bg-blue-400 w-[50%]' align='center'>
            //      <td>$room[room_name]</td>
             //       <td>
               //         <a href='index.php?page=room&id=$room[room_id]&name=$room[room_name]'>join now</a>
                 //   </td>
                //</tr>
                //");
            //}
        //?>
    </tbody> -->

        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow">
			<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					<tr>
						<th class="bg-blue-500" data-priority="1">ID</th>
						<th class="bg-blue-500" data-priority="2"> NAME</th>
						<th class="bg-blue-500" data-priority="3">ACTION</th>
					</tr>
				</thead>
				<tbody>
                    <?php 
                        while($room = $rw->fetch_assoc()){
                            echo("
                                <tr>
                                    <td class='text-xl text-center'>$room[room_id]</td>
                                    <td class='text-xl text-center font-bold'>$room[room_name]</td>
                                    <td class='text-xl text-center underline hover:text-blue-600'>
                                       <a href='index.php?page=room&id=$room[room_id]&name=$room[room_name]'>join now</a>
                                     </td>
                                </tr>
                            ");
                        }
                    ?>
				</tbody>

			</table>
                    </div>


		</div>
</body>

<script>
    	$(document).ready(function() {

var table = $('#example').DataTable({
        responsive: true,
    })
    .columns.adjust()
    .responsive.recalc();
});
</script>
<style>
	.dataTables_wrapper select,
	.dataTables_wrapper .dataTables_filter input {
		color: #4a5568;
		padding-left: 1rem;
		padding-right: 1rem;
		padding-top: .5rem;
		padding-bottom: .5rem;
		line-height: 1.25;
		border-width: 2px;
		border-radius: .25rem;
		border-color: #edf2f7;
		background-color: #edf2f7;
	}

	table.dataTable.hover tbody tr:hover,
	table.dataTable.display tbody tr:hover {
		background-color: #ebf4ff;
	}

	.dataTables_wrapper .dataTables_paginate .paginate_button {
		font-weight: 700;
		border-radius: .25rem;
		border: 1px solid transparent;
	}

	.dataTables_wrapper .dataTables_paginate .paginate_button.current {
		color: #fff !important;
		box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
		font-weight: 700;
		border-radius: .25rem;
		background: #667eea !important;
		border: 1px solid transparent;
	}

	.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
		color: #fff !important;
		box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
		font-weight: 700;
		border-radius: .25rem;
		background: #667eea !important;
		border: 1px solid transparent;
	}

	table.dataTable.no-footer {
		border-bottom: 1px solid #e2e8f0;
		margin-top: 0.75em;
		margin-bottom: 0.75em;
	}

	table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
	table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
		background-color: #667eea !important;
		/*bg-indigo-500*/
	}
</style>
</html>