<!DOCTYPE html>
<html lang="fr">

<head>

  <?php

include 'head.php'; ?>


</head>

<body>

    <?php

include 'header.php';
if ($loc != "connection") {
  include 'navigation.php';
}

include '././app/controller/ctrlContent.php';

?>

    <script src="<?=BASE_URL ?>public/js/toastui-chart.min.js"></script>
  <!-- <script src="https://uicdn.toast.com/chart/latest/toastui-chart.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="<?=BASE_URL ?>public/js/toastui-chart.min.js"></script>
  <script src="<?=BASE_URL ?>public/js/statOrders.js"></script>
  <script src="<?=BASE_URL ?>public/js/statConsult.js"></script>
  <script src="<?=BASE_URL ?>public/js/toast-chart.js"></script>
  <script src="<?=BASE_URL ?>public/js/statsCharts.js"></script>
  <script src="<?=BASE_URL ?>public/js/addUsers.js"></script>

</body>

</html>