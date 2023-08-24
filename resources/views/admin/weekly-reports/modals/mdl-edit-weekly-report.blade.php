<div class="modal fade" id="edit-weekly-sales-row" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="edit-weekly-sales-rowLabel">Update Weekly Sales Data</h4>
            </div>
            <form action="{{ route('admin.reports.custom-weekly-report.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-dark text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marketplace">One year Ago Total Sales (Units)</label>
                                <input type="number" value="{{$item->total_units_oneyearago}}" class="form-control" required name="total_sales_units_oneyearago">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marketplace">One year Ago Total Sales (Amount)</label>
                                <input type="number" value="{{$item->total_amount_oneyearago}}" class="form-control" required name="total_sales_amount_oneyearago">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marketplace">Total Order (Units)</label>
                                <input type="number" value="{{$item->total_units}}" class="form-control" required name="total_units">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marketplace">Ads Order (Units)</label>
                                <input type="number" value="{{$item->ads_units}}" class="form-control" required name="ads_units">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marketplace">Total Sales (Amount)</label>
                                <input type="number" value="{{$item->total_sales}}" class="form-control" required name="total_sales">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marketplace">Ads Sales (Amount)</label>
                                <input type="number" value="{{$item->total_ads_sales}}" class="form-control" required name="total_ads_sales">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marketplace">Total Cost</label>
                                <input type="number" value="{{$item->total_cost}}" class="form-control" required name="total_cost">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marketplace">Total Impressions</label>
                                <input type="number" value="{{$item->total_impressions}}" class="form-control" required name="total_impressions">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marketplace">Total Clicks</label>
                                <input type="number" value="{{$item->total_clicks}}" class="form-control" required name="total_clicks">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marketplace">TACOS</label>
                                <input type="number" value="{{$item->average_tacos}}" class="form-control" required name="average_tacos">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="marketplace">ACOS</label>
                                <input type="number" value="{{$item->average_acos}}" class="form-control" required name="average_acos">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="marketplace">ROAS</label>
                                <input type="number" value="{{$item->average_roas}}" class="form-control" required name="average_roas">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="marketplace">CPC</label>
                                <input type="number" value="{{$item->average_cpc}}" class="form-control" required name="average_cpc">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="marketplace">Click Through Rate [CR]</label>
                                <input type="number" value="{{$item->average_cr}}" class="form-control" required name="average_cr">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>