 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              Report Pengeluaran
                            </h2>
                             

                            
                        </div>
                        <div class="body">
                                <form action="<?php echo base_url('report_out/print'); ?>" method="POST" target="_blank">
                                    <div class="form-group">
                                        <label> From : </label>
                                        <div class="form-line">
                                            <input type="text" name="from" id="from" required="required" class="datepicker form-control" placeholder="From" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> To : </label>
                                        <div class="form-line">
                                            <input type="text" name="to" id="to"  required="required" class="datepicker form-control" placeholder="To" />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary"> <i class="material-icons">print</i> Generate Report Pengeluaran </button>
                                </form>
  
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>  
   <script type="text/javascript"> 
         
  
 
         $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
     });
         
    </script>