<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8|7 Datatables Tutorial</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 align-content-center">
        <div class="row">
            <div class="col-md-4"><input type="text" id="searchName" name="searchName" placeholder="search by name"></div>
            <div class="col-md-4"><input type="text" id="searchEmail" name="searchEmail" placeholder="search by email"></div>
            <div class="col-md-4"><input type="text" id="searchSalary" name="searchSalary" placeholder="search by salary"></div>
        </div>
    </div>
    <div class=" container mt-5">
        <table id="testtable">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Salary</th>
                <th>Action</th>

            </thead>
        </table>
    </div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(function(){
    var table= $('#testtable').DataTable({

        processing:true,
        serverSide:true,
        ajax:"<?php echo e(route('get.data')); ?>",
        columns:[
            {data:'name',name:'name'},
            {data:'email',name:'email'},
            {data:'salary',name:'salary'},
            {
                data:'action',
                name:'action',
                orderable:true,
                searchable:true
            },

        ]
    })
})

</script>


<script type="text/javascript">
    $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '<?php echo e(URL::to('search/data')); ?>',
    data:{'search':$value},
    success:function(data){
    $('tbody').html(data);
    }
    });
    })
    </script>



<script type="text/javascript">

    $('#searchEmail').on('keyup',function(){

    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '<?php echo e(URL::to('search/data')); ?>',
    data:{'searchEmail':$value},
    success:function(data){
    $('tbody').html(data);
    }
    });
    })
    </script>


<script type="text/javascript">
    $('#searchName').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '<?php echo e(URL::to('search/data')); ?>',
    data:{'searchName':$value},
    success:function(data){
    $('tbody').html(data);
    }
    });
    })
    </script>

    <script type="text/javascript">
        $('#searchSalary').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
        type : 'get',
        url : '<?php echo e(URL::to('search/data')); ?>',
        data:{'searchSalary':$value},
        success:function(data){
        $('tbody').html(data);
        }
        });
        })
        </script>


</html>
<?php /**PATH E:\binary_solution\YajraDatabase2\resources\views/data.blade.php ENDPATH**/ ?>