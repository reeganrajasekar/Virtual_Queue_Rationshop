<?php require("./layout/Header.php") ?>
<?php require("./layout/db.php") ?>

<div class="container mt-3">
    <h3 class="mt-4" style="color:#2b74e2;display:flex;flex-direction:row;justify-content:space-between">
        <span>Products :</span>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add
        </button>
    </h3>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin_trichy/action/product.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" required name="name" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Product Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" required name="rate" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Product Rate</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" required name="stock" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Product Stock</label>
                    </div>
                    <div class="form-floating mb-3 text-end">
                        <button class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <br>  
    <div class="table-responsive">        
    <table class="table table-striped table-bordered">
        <thead style="text-align:center">
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Rate</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $result = $conn->query("SELECT * FROM product WHERE center='Trichy' ORDER BY id DESC");
            if($result->num_rows > 0){
                $i=0;
                while($row = $result->fetch_assoc()){
                    $i++;
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo($i) ?></td>
                            <td><?php echo($row["name"]) ?></td>
                            <td><?php echo($row["rate"]) ?></td>
                            <td><?php echo($row["stock"]) ?></td>
                            <td>
                                <form action="/admin_trichy/action/delete.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo($row["id"]) ?>">
                                    <center>
                                        <button class="btn btn-danger w-75">Delete</button>
                                    </center>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
            }else{
            ?>
            <tr>
                <td style="text-align:center" colspan="5">Nothing Found</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
    <br>
</div>


<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(urlParams.get('err')){
      document.write("<div id='err' style='position:fixed;bottom:30px; right:30px;background-color:#FF0000;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('err')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("err").style.display="none"
    }, 3000)
</script>

<script>
    if(urlParams.get('msg')){
      document.write("<div id='msg' style='position:fixed;bottom:30px; right:30px;background-color:#4CAF50;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('msg')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("msg").style.display="none"
    }, 3000)
</script>


<?php require("./layout/Footer.php") ?>