<!DOCTYPE html>
<html>
<head>
    <title>Tittle</title>
    <style type="text/css" media="print">
    @page {
        margin: 0;  /* this affects the margin in the printer settings */
    }
      table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
      }
      table th{
          -webkit-print-color-adjust:exact;
        border: 1px solid;

                padding-top: 11px;
    padding-bottom: 11px;
    background-color: #a29bfe;
      }
   table td{
        border: 1px solid;

   }
        </style>
</head>
<body>
    <h3 align="center">DATA T Revenue</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Rbt</th>
		<th>Revenue</th>
		<th>Month</th>
		<th>Download</th>
		<th>Renew</th>
		<th>Campaign</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($c_revenue_data as $c_revenue)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $c_revenue->id_rbt ?></td>
		      <td><?php echo $c_revenue->revenue ?></td>
		      <td><?php echo $c_revenue->month ?></td>
		      <td><?php echo $c_revenue->download ?></td>
		      <td><?php echo $c_revenue->renew ?></td>
		      <td><?php echo $c_revenue->campaign ?></td>
		      <td><?php echo $c_revenue->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
</body>
<script type="text/javascript">
      window.print()
    </script>
</html>