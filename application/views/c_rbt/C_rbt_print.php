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
    <h3 align="center">DATA T Rbt</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Judul</th>
		<th>Artis</th>
		<th>PenciptaId</th>
		<th>PartnerId</th>
		<th>KdTsel</th>
		<th>KdXL</th>
		<th>KdIsat</th>
		<th>KdM8</th>
		<th>KdFlexi</th>
		
            </tr><?php
            foreach ($c_rbt_data as $c_rbt)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $c_rbt->judul ?></td>
		      <td><?php echo $c_rbt->artis ?></td>
		      <td><?php echo $c_rbt->penciptaId ?></td>
		      <td><?php echo $c_rbt->partnerId ?></td>
		      <td><?php echo $c_rbt->kdTsel ?></td>
		      <td><?php echo $c_rbt->kdXL ?></td>
		      <td><?php echo $c_rbt->kdIsat ?></td>
		      <td><?php echo $c_rbt->kdM8 ?></td>
		      <td><?php echo $c_rbt->kdFlexi ?></td>	
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