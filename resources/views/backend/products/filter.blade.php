<div class="row">
    <div class="col-md-12">
        <div class="box box-primary" id="accordion">
            <div class="box-header with-border" style="cursor: pointer;">
                <h3 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFilter">
                        <i class="fa fa-filter" aria-hidden="true"></i> Filter
                    </a>
                </h3>
            </div>
            <div id="collapseFilter" class="panel-collapse active collapse in" aria-expanded="true">
                <div class="box-body d-flex">
                    <div class="col-md-6">
                        <div class="row input-daterange d-flex" style="display: inline-block;">

                            <div class="col-md-5">
                                <label for="From 0h date:">From 0h Date:</label>
                                <input type="date" name="from_date" id="from_date" class="form-control"
                                    placeholder="From 0h date">
                            </div>

                            <div class="col-md-5">
                                <label for="To 0h date:">To 0h Date:</label>
                                <input type="date" name="to_date" id="to_date" class="form-control"
                                    placeholder="To 0h date">
                            </div>
                            <div class="col-md-2">  
                                <button type="button" name="filter" id="filter"
                                    class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="Category:">Category:</label>
                            <select name="phan_loai" id="phan_loai" class="form-control" required="required">
                                <option value="">-- Select --</option>
                                <option value="giai_trinh">Explanation Form</option>
                                <option value="de_nghi">Request Form</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
