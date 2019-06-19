<section class="content">
        <div class="container-fluid">
            
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>รายละเอียดการยืม</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="<?php echo base_url('home/borrow')?>" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <?php 
                                        // var_dump($book);
                                        if(isset($book) && is_array($book) && count($book)){
                                        foreach ($book as $key => $rows) {
                                    ?>

                                        <label class="">ชื่อหนังสือ</label>
                                        <input type="text" class="form-control" value="<?php echo $rows['name']; ?>" disabled>
                                        <input type="hidden" class="form-control" value="<?php echo $rows['id']; ?>" name="book_id">
                                        <input type="hidden" class="form-control" value="<?php echo $rows['name']; ?>" name="book_name">
                                        <input type="hidden" class="form-control" value="<?php echo $rows['balance']; ?>" name="balance">
                                    <?php }} ?>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="">ชื่อผู้ยืม</label>
                                        <input type="text" class="form-control" name="member_name" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="">สถานะ</label>
                                            <select class="form-control show-tick" name="status" required>
                                                <option value="ยืมหนังสือ">ยืมหนังสือ</option>
                                                <option value="คืนหนังสือ">คืนหนังสือ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="">จำนวน</label>
                                            <input type="number" name="amount" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="">วันที่คืน</label>
                                            <input type="date" name="return_date" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">บันทึก</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
        </div>
    </section>
