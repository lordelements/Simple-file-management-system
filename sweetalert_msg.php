<?php

    if (isset($_SESSION['status'])) {
        ?>

        <script>
            swal({
            title: "<?php echo $_SESSION['status'] ?>",
            text: "<?php echo $_SESSION['status_text'] ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            });
        </script>

      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
      </head>
      <body>
        
      </body>
      </html>
    <?php
            unset($_SESSION['status']);
        }
    ?>


<!-- 
<script>
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this imaginary file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        swal("Poof! Your imaginary file has been deleted!", {
        icon: "success",
        });
    } else {
        swal("Your imaginary file is safe!");
    }
    });
</script> -->