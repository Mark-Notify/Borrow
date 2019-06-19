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
                                ตารางประวัติการยืม - คืน
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ชื่อสมาชิก</th>
                                            <th>ชื่อหนังสือ</th>
                                            <th>จำนวน</th>
                                            <th>วันที่ยืม</th>
                                            <th>กำหนดการส่งคืน</th>
                                            <th>สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                        if(isset($list_history) && is_array($list_history) && count($list_history)){
                                        $i =1;
                                        foreach ($list_history as $key => $rows) {
                                      ?>
                                      <form action="" name="frmMain" id="frmMain" method="post">
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $rows['member_name']; ?></td>
                                            <td><?php echo $rows['book_name']; ?></td>
                                            <td><?php echo $rows['amount_book']; ?></td>
                                            <td><?php echo $rows['start_date']; ?></td>
                                            <!-- <td><?php echo $rows['balance']; ?></td> -->
                                            <td><?php echo $rows['end_date']; ?></td>
                                            <?php 
                                                if ($rows['status_borrow'] == 'ยืมหนังสือ') {
                                            ?>
                                            <td onclick="test(<?php echo $rows['id_book']; ?>,<?php echo $rows['amount_book']; ?>,<?php echo $rows['book_id']; ?>,<?php echo $rows['balance']; ?>)" style="color: red;cursor: pointer;">ยืมหนังสือ</td>
                                            <?php
                                                }else{
                                                    echo "<td style='color: green;cursor: pointer;'>ส่งคืนแล้ว</td>";
                                                }
                                            ?>
                                            
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
                                        </form>
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

<script type="text/javascript">

    function test($id,$amount_book,$book_id,$balance) {
        // alert($book_id);
        var answer = confirm ("ยืนยันการส่งคืน");
        if (answer)
        {
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('Home/send/');?>",
            data: "id="+$id+"&amount_book="+$amount_book+"&book_id="+$book_id+"&balance="+$balance,
          });
          location.reload();
        }
    }
</script>
