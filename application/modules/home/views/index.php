<section class="content">
        <div class="container-fluid">
            <!-- <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div> -->
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ตารางรายการหนังสือ
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <button type="button" data-toggle="modal" data-target=".addBook" class="btn bg-orange waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>เพิ่มหนังสือ</span>
                                </button>
                            </ul>
                            <div class="modal fade addBook" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มหนังสือ</h5>
                                  </div>
                                  <div class="modal-body">
                                    <div class="body">
                                        <form class="form-horizontal" action="<?php echo base_url('home/save')?>" method="POST">
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="">ชื่อหนังสือ</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" name="name" class="form-control" placeholder="Enter your Book Name" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="">ประเภทหนังสือ</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <select class="form-control show-tick" name="category" required="">
                                                                <option value=""></option>
                                                                <option value="อุปกรณ์">อุปกรณ์</option>
                                                                <option value="Student Book">Student Book</option>
                                                                <option value="Techer Book">Techer Book</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="">จำนวน</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="number" name="amount" class="form-control" placeholder="Enter your Amount" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" id="btn_save" class="btn btn-primary">บันทึก</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                  </div></form>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ชื่อหนังสือ</th>
                                            <th>ประเภทหนังสือ</th>
                                            <th>จำนวน</th>
                                            <th>คงเหลือ</th>
                                            <!-- <th>สถานะ</th> -->
                                            <th>ยืม</th>
                                            <!-- <th>วันที่</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Amount</th>
                                            <th>Balance</th>
                                            <!-- <th>Status</th> -->
                                            <th>Booking</th>
                                            <!-- <th>Date</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php 
                                        if(isset($books) && is_array($books) && count($books)){
                                        $i =1;
                                        foreach ($books as $key => $rows) {
                                      ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $rows['name']; ?></td>
                                            <td><?php echo $rows['category']; ?></td>
                                            <td><?php echo $rows['amount']; ?></td>
                                            <td><?php echo $rows['balance']; ?></td>
                                            <!-- <td><?php echo $rows['status']; ?></td> -->
                                            <td>
                                                <a href="<?php echo base_url('home/edit/').$rows['id'];?>">
                                                    <button type="button" class="btn bg-blue waves-effect detail-booking">
                                                        <i class="material-icons">verified_user</i>
                                                        <span>ยืมหนังสือ</span>
                                                    </button>
                                                </a>
                                                
                                            </td>
                                            <!-- <td><?php echo $rows['create_date']; ?></td> -->
                                        </tr>
                                      <?php $i++; }
                                        }else{
                                      ?>
                                            <tr>
                                                <td colspan="6">ไม่มีข้อมูล</td>
                                            </tr>
                                      <?php
                                        }
                                       ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>