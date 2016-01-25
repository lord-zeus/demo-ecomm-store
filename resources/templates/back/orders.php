<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
</div>

<div class="row">
<h3 class="bg-success"><?php display_message(); ?></h3>
<table class="table table-hover">
    <thead>

      <tr>
           <th>ID</th>
           <th>Amount</th>
           <th>Transaction</th>
           <th>Currency</th>
           <th>Status</th>
           <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php display_orders() ?>
    </tbody>
</table>
</div>
