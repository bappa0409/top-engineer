$(document).ready(function () {
    // Initialize Select2 properly
    function initSelect2() {
        $('#zone_id, #circle_id, #division_id, #location_id').select2({
            width: '100%',
        });
    }

    initSelect2(); // Initialize Select2 on page load

    // Show loading state in a select box
    function showLoading(selector) {
        $(selector).empty()
            .append('<option value="">Loading...</option>')
            .prop('disabled', true)
            .trigger('change');
    }

    // Hide loading and show default or no-data message
    function hideLoading(selector, defaultText, data) {
        $(selector).empty();

        if (data.length === 0) {
            $(selector)
                .append('<option selected disabled>No Data Available</option>')
                .prop('disabled', true)
                .trigger('change');
        } else {
            $(selector)
                .append('<option value="">' + defaultText + '</option>')
                .prop('disabled', false)
                .trigger('change');
        }
    }

    function checkFormCompletion() {
        const zone = $('#zone_id').val();
        const circle = $('#circle_id').val();
        const division = $('#division_id').val();
        const location = $('#location_id').val();
        const month = $('#month_id').val();

        const allSelected = zone && circle && division && location && month;

        if (allSelected) {
            $('#energy_sold, #billed_amount, #collected_amount, #sector_wise, #mod_view, #summary_report, #account_receivable')
                .prop('disabled', false);
        } else {
            $('#energy_sold, #billed_amount, #collected_amount, #sector_wise, #mod_view, #summary_report, #account_receivable')
                .prop('disabled', true);
        }
    }

    // Highlight clicked button
    $('.report-trigger').on('click', function () {
        $('.report-trigger').removeClass('active');
        $(this).addClass('active');
    });


    // When zone changes, load circles
    $('#zone_id').on('change', function () {
        let zoneCode = $(this).val();
        let url = $(this).data('route');
        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        if (zoneCode) {
            showLoading('#circle_id');

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    zone_code: zoneCode,
                    _token: csrfToken
                },
                success: function (data) {

                    hideLoading('#circle_id', 'Select Circle', data);

                    $.each(data, function (key, circle) {
                        $('#circle_id').append('<option value="' + circle.CIRCLE_CODE + '">' + circle.CIRCLE_NAME + '</option>');
                    });

                    $('#circle_id').trigger('change');  // Refresh Select2
                },
                error: function () {
                    hideLoading('#circle_id', 'Select Circle', []);
                }
            });
        } else {
            hideLoading('#circle_id', 'Select Circle', []);
        }

        checkFormCompletion();
        $('#month_id').val('').trigger('change');
    });

    // When circle changes, load divisions
    $('#circle_id').on('change', function () {
        let circleCode = $(this).val();
        let url = $(this).data('route');
        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        if (circleCode) {
            showLoading('#division_id');

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    circle_code: circleCode,
                    _token: csrfToken
                },
                success: function (data) {
                    hideLoading('#division_id', 'Select Division', data);

                    $.each(data, function (key, division) {
                        $('#division_id').append('<option value="' + division.DIV_CODE + '">' + division.DIV_NAME + '</option>');
                    });

                    $('#division_id').trigger('change');
                },
                error: function () {
                    hideLoading('#division_id', 'Select Division', []);
                }
            });
        } else {
            hideLoading('#division_id', 'Select Division', []);
        }

        checkFormCompletion();
    });

    // When division changes, load locations
    $('#division_id').on('change', function () {
        let circleCode = $('#circle_id').val();
        let divisionCode = $(this).val();
        let url = $(this).data('route');
        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        if (divisionCode) {
            showLoading('#location_id');

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    circle_code: circleCode,
                    div_code: divisionCode,
                    _token: csrfToken
                },
                success: function (data) {
                    hideLoading('#location_id', 'Select Location', data);

                    $.each(data, function (key, location) {
                        $('#location_id').append('<option value="' + location.LOCATION_CODE + '">' + location.LOCATION_NAME + '</option>');
                    });

                    $('#location_id').trigger('change');
                },
                error: function () {
                    hideLoading('#location_id', 'Select Location', []);
                }
            });
        } else {
            hideLoading('#location_id', 'Select Location', []);
        }

        checkFormCompletion();
    });

    // Month Change
    $('#month_id').on('change', checkFormCompletion);

    // Trigger once on load in case values are already selected
    checkFormCompletion();


    $('#mod_view').on('click', function () {
        const billCycleCode = $('#month_id').val();
        const locationCode = $('#location_id').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).data('route');

        hideAllReports();

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: csrfToken,
                bill_cycle_code: billCycleCode,
                location_code: locationCode
            },
            beforeSend: function () {
                $('#report-modView')
                    .removeClass('d-none')
                    .html('<div class="text-center text-muted py-3">Loading MOD View Report...</div>');
            },
            success: function (response) {
                if (response.length > 0) {
                    let html = `
                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">MOD View</h3>
                            <p><strong>Bill Cycle:</strong> ${$('#month_id option:selected').text()}</p>
                        </div>

                        <div class="table-responsive">
                            <table class="table table1 table-bordered text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Item Name</th>
                                        <th>Current Month</th>
                                        <th>Upto Month</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                                    $.each(response, function (index, item) {
                                        html += `<tr>
                                                    <td>${item.SL_NO}</td>
                                                    <td>${item.ITEM_NAME}</td>
                                                    <td class="text-end">${Number(item.CURR_MONTH).toLocaleString()}</td>
                                                    <td class="text-end">${Number(item.UPTO_MONTH).toLocaleString()}</td>
                                                </tr>`;
                                    });

                                    html += `
                                </tbody>
                            </table>
                        </div>
                    </div>`;

                    $('#report-modView').html(html);
                } else {
                    $('#report-modView').html('<div class="text-danger text-center py-3">No data found for this selection.</div>');
                }
            },
            error: function () {
                $('#report-modView').html('<div class="text-danger text-center py-3">Failed to load data. Please try again.</div>');
            }
        });
    });
    
    $('#energy_sold').on('click', function () {
        const billCycleCode = $('#month_id').val();
        const locationCode = $('#location_id').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).data('route');

        hideAllReports();

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: csrfToken,
                bill_cycle_code: billCycleCode,
                location_code: locationCode
            },
            beforeSend: function () {
                $('#report-energySold')
                    .removeClass('d-none')
                    .html('<div class="text-center text-muted py-3">Loading Energy Sold Report...</div>');
            },
            success: function (response) {
                if (response.length > 0) {
                    const officeName = response[0]?.LOCATION_NAME ?? '';
                    const officeCode = response[0]?.LOCATION_CODE ?? '';
                    const fullOfficeName = `${officeName} (${officeCode})`;
                    
                    const circleName = response[0]?.CIRCLE_NAME ?? '';
                    const raoName = response[0]?.RAO_NAME ?? '';
                    
                    let html = `
                    <div class="d-flex justify-content-start my-3">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                    </div>
                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">Bangladesh Power Development Board</h3>
                            <p><strong>Bill Cycle:</strong> ${$('#month_id option:selected').text()}</p>
                        </div>

                        <div class="table-responsive">
                            <div>
                                <h6><strong>Name of the Office :</strong> ${fullOfficeName}</h6>
                                <h6><strong>Name of the Circle :</strong> ${circleName}</h6>
                                <h6><strong>Name of the RAO :</strong> ${raoName}</h6>
                                <h5 class="fw-bold mt-3">1.2. CONSUMER BILLED & ENERGY SOLD :</h5>
                            </div>
                            <table class="table table1 table-bordered text-center align-middle">
                                <thead>
                                    <tr class="align-middle">
                                        <th scope="col" rowspan="2">Category</th>
                                        <th scope="col" rowspan="2">Previous Month End Consumer</th>
                                        <th scope="col" rowspan="2">Newly Connected Consumer</th>
                                        <th scope="col" rowspan="2">Permanently Disconnected Consumer</th>
                                        <th scope="col" rowspan="2">Total Number of Consumer</th>
                                        <th scope="col" rowspan="2">Disconnected Seasonal Consumer</th>
                                        <th scope="col" rowspan="2">Active Consumer</th>
                                        <th scope="col" rowspan="2">Number Of Consumers Billed</th>
                                        <th scope="col" colspan="3">Energy Sold in Kwh</th>
                                    </tr>
                                    <tr class="align-middle">
                                        <th scope="col">Current Month</th>
                                        <th scope="col">Previous Month</th>
                                        <th scope="col">Category</th>
                                    </tr>
                                </thead>
                            <tbody>`;

                                $.each(response, function (index, item) {
                                    html += `<tr>
                                        <td>${item.CATEGORY ?? ''}</td>
                                        <td>${item.LIVE_CONSUMER_PREV_MONTH ?? ''}</td>
                                        <td>${item.NEW_CONSUMER_IN_MONTH ?? ''}</td>
                                        <td>${item.PD_CONSUMER_IN_MONTH ?? ''}</td>
                                        <td>${item.TTL_COUSTOMER ?? ''}</td>
                                        <td>${item.TD_CONSUMER ?? ''}</td>
                                        <td>${item.ACTIVE_CONSUMER ?? ''}</td>
                                        <td>${item.BILLED_CONSUMER ?? ''}</td>
                                        <td class="text-end">${Number(item.TOTAL_ENERGY_SOLD || 0).toLocaleString()}</td>
                                        <td class="text-end">${Number(item.PREV_MONTH_ENERGY_SOLD || 0).toLocaleString()}</td>
                                        <td>${item.CATEGORY_IV ?? ''}</td>
                                    </tr>`;
                                });

                                html += `
                                </tbody>
                            </table>

                            <div class="mt-3">
                                <h6 class="fw-bold text-decoration-underline">New Connection Information :</h6>
                                <p class="mb-1">No. of Application pending at the end of previous Month :</p>
                                <p class="mb-1">(+) No. of Application Received during the Month :</p>
                                <p class="mb-1">(-) Newly Connected Consumer during the month :</p>
                                <p class="mb-1">No. of Application Pending at the end of Current Month :</p>
                                <p class="mb-1">Certified that above date are true Correct & based on records.</p>
                            </div>
                            
                            <table class="w-100 mt-5">
                                <tr>
                                    <td class="text-start" style="width: 33%;">Prepared By</td>
                                    <td class="text-center" style="width: 33%;">Checked By</td>
                                    <td class="text-end" style="width: 33%;">
                                        (Signature and Seal)<br>
                                        <strong>Head of the Office</strong>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>`;

                    $('#report-energySold').html(html);
                } else {
                    $('#report-energySold').html('<div class="text-danger text-center py-3">No data found for this selection.</div>');
                }
            },
            error: function () {
                $('#report-energySold').html('<div class="text-danger text-center py-3">Failed to load data. Please try again.</div>');
            }
        });
    }); 
    
    $('#summary_report').on('click', function () {
        const billCycleCode = $('#month_id').val();
        const locationCode = $('#location_id').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).data('route');

        hideAllReports();

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: csrfToken,
                bill_cycle_code: billCycleCode,
                location_code: locationCode
            },
            beforeSend: function () {
                $('#report-summaryReport')
                    .removeClass('d-none')
                    .html('<div class="text-center text-muted py-3">Loading Summary Report...</div>');
            },
            success: function (response) {
                console.log(response);
                
                if (response.length > 0) {
                    const officeName = response[0]?.LOCATION_NAME ?? '';
                    const officeCode = response[0]?.LOCATION_CODE ?? '';
                    const fullOfficeName = `${officeName} (${officeCode})`;
                    
                    const circleName = response[0]?.CIRCLE_DESC ?? '';
                    const raoName = response[0]?.RAO_NAME ?? '';
                    
                    let html = `
                    <div class="d-flex justify-content-start my-3">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                    </div>
                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">Bangladesh Power Development Board</h3>
                            <p><strong>Bill Cycle:</strong> ${$('#month_id option:selected').text()}</p>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h6><strong>Name of the Office :</strong> ${fullOfficeName}</h6>
                                <h6><strong>Name of the Circle :</strong> ${circleName}</h6>
                                <h6><strong>Name of the RAO :</strong> ${raoName}</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table1 table-bordered text-center align-middle">
                                <thead>
                                    <tr class="align-middle">
                                        <th>Sl.</th>
                                        <th>Items</th>
                                        <th>Current Month</th>
                                        <th>Previous Month</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    $.each(response, function (index, item) {
                        html += `<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>`;
                    });

                    html += `
                                </tbody>
                            </table>
                            <div class="mt-5">
                                <table class="w-100">
                                    <tr>
                                        <td class="text-start" style="width: 33%;">Prepared By</td>
                                        <td class="text-center" style="width: 33%;">Checked By</td>
                                        <td class="text-end" style="width: 33%;">
                                            (Signature and Seal)<br>
                                            <strong>Head of the Office</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>`;

                    $('#report-summaryReport').html(html);
                    
                } else {
                    $('#report-summaryReport').html('<div class="text-danger text-center py-3">No data found for this selection.</div>');
                }
            },
            error: function () {
                $('#report-summaryReport').html('<div class="text-danger text-center py-3">Failed to load data. Please try again.</div>');
            }
        });
    }); 
    
    $('#account_receivable').on('click', function () {
        const billCycleCode = $('#month_id').val();
        const locationCode = $('#location_id').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).data('route');

        hideAllReports();

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: csrfToken,
                bill_cycle_code: billCycleCode,
                location_code: locationCode
            },
            beforeSend: function () {
                $('#report-accountReceivable')
                    .removeClass('d-none')
                    .html('<div class="text-center text-muted py-3">Loading Summary Report...</div>');
            },
            success: function (response) {
                console.log(response);
                
                if (response.result1.length > 0) {
                    const officeName = response.result1[0]?.LOCATION_NAME ?? '';
                    const officeCode = response.result1[0]?.LOCATION_CODE ?? '';
                    const fullOfficeName = `${officeName} (${officeCode})`;
                    
                    const circleName = response.result1[0]?.CIRCLE_NAME ?? '';
                    const raoName = response.result1[0]?.RAO_NAME ?? '';
                    
                    let html = `
                    <div class="d-flex justify-content-start my-3">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                    </div>
                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">Bangladesh Power Development Board</h3>
                            <p><strong>Bill Cycle:</strong> ${$('#month_id option:selected').text()}</p>
                        </div>
                        
                        <div class="table-responsive">
                            <div>
                                <h6><strong>Name of the Office :</strong> ${fullOfficeName}</h6>
                                <h6><strong>Name of the Circle :</strong> ${circleName}</h6>
                                <h6><strong>Name of the RAO :</strong> ${raoName}</h6>
                                <h5 class="fw-bold mt-3">5.Accounts Receivable (taka) :</h5>
                            </div>
                            <table class="table table1 table-bordered text-center align-middle">
                                <thead>
                                    <tr class="align-middle">
                                        <th width="25%">Type Of Consumer </th>
                                        <th>Category</th>
                                        <th>Amount Receivable at the end of previous month</th>
                                        <th>Amount Billed for the Month ( current month )</th>
                                        <th>Amount Collected for the month ( current month )</th>
                                        <th>Amount Receivable at the end of Current Month</th>
                                        <th>Equivalent Month</th>
                                    </tr>
                                </thead>
                            <tbody>`;

                                $.each(response.result1, function (index, item) {
                                    html += `<tr>
                                        <td width="25%">${item.USAGE_CAT_NAME ?? ''}</td>
                                        <td>${item.CATEGORY ?? ''}</td>
                                        <td>${item.AMT_RECV_PREV_MONTH ?? ''}</td>
                                        <td>${item.CUR_MONTH_BILLED_AMT ?? ''}</td>
                                        <td>${item.CUR_MONTH_COL_AMT ?? ''}</td>
                                        <td>${item.AMT_RECV_CUR_MONTH ?? ''}</td>
                                        <td>${item.EQUIVALENT_MONTH ?? ''}</td>
                                    </tr>`;
                                });

                                html += `
                                </tbody>
                            </table>


                            <div class="mt-5">
                                <h5 class="fw-bold">6. Minimum Charge :</h5>
                            </div>
                            <table class="table table2 table-bordered text-center align-middle">
                                <thead>
                                    <tr class="align-middle">
                                        <th rowspan="2">Type of Consumer</th>
                                        <th rowspan="2">Category</th>
                                        <th rowspan="2">Number of Consumer Billed</th>
                                        <th colspan="1">Engery billed</th>
                                        <th colspan="1">Amount billed</th>
                                    </tr>
                                    <tr class="align-middle">
                                        <th>Kwh</th>
                                        <th>Taka</th>
                                    </tr>
                                </thead>
                            <tbody>`;

                                $.each(response.result2, function (index, item) {
                                    html += `<tr>
                                        <td width="25%">${item.USAGE_CAT_NAME ?? ''}</td>
                                        <td>${item.CATEGORY ?? ''}</td>
                                        <td>${item.AMT_RECV_PREV_MONTH ?? ''}</td>
                                        <td>${item.CUR_MONTH_BILLED_AMT ?? ''}</td>
                                        <td>${item.CUR_MONTH_COL_AMT ?? ''}</td>
                                        <td>${item.AMT_RECV_CUR_MONTH ?? ''}</td>
                                        <td>${item.EQUIVALENT_MONTH ?? ''}</td>
                                    </tr>`;
                                });

                                html += `
                                </tbody>
                            </table>

                            <div class="mt-3">
                                <p class="mb-1">Certified that the above data are true, correct & based on records.</p>
                                <p>N.B. = According to Computer Receivable Amount.</p>
                            </div>

                            <table class="w-100 mt-5">
                                <tr>
                                    <td class="text-start" style="width: 33%;">Prepared By</td>
                                    <td class="text-center" style="width: 33%;">Checked By</td>
                                    <td class="text-end" style="width: 33%;">
                                        (Signature and Seal)<br>
                                        <strong>Head of the Office</strong>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>`;

                    $('#report-accountReceivable').html(html);
                    
                } else {
                    $('#report-accountReceivable').html('<div class="text-danger text-center py-3">No data found for this selection.</div>');
                }
            },
            error: function () {
                $('#report-accountReceivable').html('<div class="text-danger text-center py-3">Failed to load data. Please try again.</div>');
            }
        });
    });

    $('#billed_amount').on('click', function () {
        const billCycleCode = $('#month_id').val();
        const locationCode = $('#location_id').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).data('route');

        hideAllReports();

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: csrfToken,
                bill_cycle_code: billCycleCode,
                location_code: locationCode
            },
            beforeSend: function () {
                $('#report-billedAmount')
                    .removeClass('d-none')
                    .html('<div class="text-center text-muted py-3">Loading Summary Report...</div>');
            },
            success: function (response) {
                console.log(response);
                
                if (response.result1.length > 0) {
                    const officeName = response.result1[0]?.LOCATION_NAME ?? '';
                    const officeCode = response.result1[0]?.LOCATION_CODE ?? '';
                    const fullOfficeName = `${officeName} (${officeCode})`;
                    
                    const circleName = response.result1[0]?.CIRCLE_NAME ?? '';
                    const raoName = response.result1[0]?.RAO_NAME ?? '';
                    
                    let html = `
                    <div class="d-flex justify-content-start my-3">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                    </div>
                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">Bangladesh Power Development Board</h3>
                            <p><strong>Bill Cycle:</strong> ${$('#month_id option:selected').text()}</p>
                        </div>
                        
                        <div class="table-responsive">
                            <div>
                                <h6><strong>Name of the Office :</strong> ${fullOfficeName}</h6>
                                <h6><strong>Name of the Circle :</strong> ${circleName}</h6>
                                <h6><strong>Name of the RAO :</strong> ${raoName}</h6>
                                <h5 class="fw-bold mt-3">3. BILLED AMOUNT :</h5>
                                <h6 class="fw-bold">3.1 NET BILLED AMOUNT :</h6>
                            </div>
                            <table class="table table1 table-bordered text-center align-middle">
                                <thead>
                                    <tr class="align-middle">
                                        <th rowspan="2">Type Of Consumer</th>
                                        <th rowspan="2">Category</th>
                                        <th colspan="4">Billed Amount(Taka)</th>
                                    </tr>
                                    <tr class="align-middle">
                                        <th>Current Month</th>
                                        <th>Rate</th>
                                        <th>Previous Month</th>
                                        <th>Rate</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                                    $.each(response.result1, function (index, item) {
                                        html += `<tr>
                                            <td>${item.USAGE_CAT_NAME ?? ''}</td>
                                            <td>${item.CATEGORY ?? ''}</td>
                                            <td>${item.CUR_MONTH_BILLED_AMT ?? ''}</td>
                                            <td>${item.CURR_RATE ?? ''}</td>
                                            <td>${item.PREV_MONTH_BILLED_AMT ?? ''}</td>
                                            <td>${item.PREV_RATE ?? ''}</td>
                                        </tr>`;
                                    });

                                    html += `
                                </tbody>
                            </table>
                            
                            
                            <div class="page-break"></div>
                            <div class="mt-5">
                                <h6 class="fw-bold">3.2 Miscellaneous Billed Amount :</h6>
                            </div>
                            <table class="table table2 table-bordered text-center align-middle">
                                <tbody>`;
                                    $.each(response.result2, function (index, item) {
                                        html += `<tr>
                                            <td>${item.MSC_BILL_TYPE_NAME ?? ''}</td>
                                            <td>${item.MISC_AMT_BILLED ?? ''}</td>
                                            <td>${item.MISC_AMT_BILLED_PREV ?? ''}</td>
                                        </tr>`;
                                    });

                                    html += `
                                </tbody>
                            </table>
                            
                            <div class="mt-3">
                                <h6 class="fw-bold text-decoration-underline">Note :</h6>
                                <div class="ps-3"> 
                                    <p class="mb-1">1) Minimum Charge Bills must also be included in category wise bills at 3.1 section above</p>
                                    <p class="mb-1">2) All the category wise billed amount shall include the Demand Charge & Service Charge.</p>                            
                                </div>
                                <p class="mb-1">Certified that the above data are true, correct & based on records.</p>
                            </div>

                            <table class="w-100 mt-5">
                                <tr>
                                    <td class="text-start" style="width: 33%;">Prepared By</td>
                                    <td class="text-center" style="width: 33%;">Checked By</td>
                                    <td class="text-end" style="width: 33%;">
                                        (Signature and Seal)<br>
                                        <strong>Head of the Office</strong>
                                    </td>
                                </tr>
                            </table>
                                
                        </div>
                    </div>`;

                    $('#report-billedAmount').html(html);
                    
                } else {
                    $('#report-billedAmount').html('<div class="text-danger text-center py-3">No data found for this selection.</div>');
                }
            },
            error: function () {
                $('#report-billedAmount').html('<div class="text-danger text-center py-3">Failed to load data. Please try again.</div>');
            }
        });
    });

    $('#collected_amount').on('click', function () {
        const billCycleCode = $('#month_id').val();
        const locationCode = $('#location_id').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).data('route');

        hideAllReports();

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: csrfToken,
                bill_cycle_code: billCycleCode,
                location_code: locationCode
            },
            beforeSend: function () {
                $('#report-collectedAmount')
                    .removeClass('d-none')
                    .html('<div class="text-center text-muted py-3">Loading Summary Report...</div>');
            },
            success: function (response) {
                console.log(response);
                
                if (response.result1.length > 0) {
                    const officeName = response.result1[0]?.LOCATION_NAME ?? '';
                    const officeCode = response.result1[0]?.LOCATION_CODE ?? '';
                    const fullOfficeName = `${officeName} (${officeCode})`;
                    
                    const circleName = response.result1[0]?.CIRCLE_NAME ?? '';
                    const raoName = response.result1[0]?.RAO_NAME ?? '';
                    
                    let html = `
                    <div class="d-flex justify-content-start my-3">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                    </div>
                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">Bangladesh Power Development Board</h3>
                            <p><strong>Bill Cycle:</strong> ${$('#month_id option:selected').text()}</p>
                        </div>

                        <div class="table-responsive">
                            <div>
                                <h6><strong>Name of the Office :</strong> ${fullOfficeName}</h6>
                                <h6><strong>Name of the Circle :</strong> ${circleName}</h6>
                                <h6><strong>Name of the RAO :</strong> ${raoName}</h6>
                                <h5 class="fw-bold mt-3">4. Collected Amount</h5>
                                <h6 class="fw-bold">4.1 Net Collected Amount :</h6>
                            </div>
                            <table class="table table1 table-bordered text-center align-middle">
                                <thead>
                                    <tr class="align-middle">
                                        <th rowspan="2">Type Of Consumer</th>
                                        <th rowspan="2">Category</th>
                                        <th colspan="4">COLLECTED Amount(Taka)</th>
                                    </tr>
                                    <tr class="align-middle">
                                        <th>Current Month</th>
                                        <th>Previous Month</th>
                                    </tr>
                                </thead>
                            <tbody>`;

                                $.each(response.result1, function (index, item) {
                                    html += `<tr>
                                        <td>${item.USAGE_CAT_NAME ?? ''}</td>
                                        <td>${item.CATEGORY ?? ''}</td>
                                        <td>${item.CUR_MONTH_COL_AMT ?? ''}</td>
                                        <td>${item.PREV_MONTH_COLLECTION_AMT ?? ''}</td>
                                    </tr>`;
                                });

                                html += `
                                </tbody>
                            </table>

                            <div class="page-break"></div>
                            <div class="mt-5">
                                <h6 class="fw-bold">4.2 Miscellaneous Collected Amount :</h6>
                            </div>

                            <table class="table table2 table-bordered text-center align-middle">
                                <thead>
                                    <tr class="align-middle">
                                        <th rowspan="2">Type Of Consumer</th>
                                        <th rowspan="2">Category</th>
                                        <th colspan="4">COLLECTED Amount(Taka)</th>
                                    </tr>
                                    <tr class="align-middle">
                                        <th>Current Month</th>
                                        <th>Previous Month</th>
                                    </tr>
                                </thead>
                            <tbody>`;

                                $.each(response.result2, function (index, item) {
                                    html += `<tr>
                                        <td>${item.MSC_BILL_TYPE_NAME ?? ''}</td>
                                        <td></td>
                                        <td>${item.MISC_AMT_COLL ?? ''}</td>
                                        <td>${item.MISC_AMT_COLL_PREV ?? ''}</td>
                                    </tr>`;
                                });

                                html += `
                                </tbody>
                            </table>
                             
                            <table class="w-100 mt-5">
                                <tr>
                                    <td class="text-start" style="width: 33%;">Prepared By</td>
                                    <td class="text-center" style="width: 33%;">Checked By</td>
                                    <td class="text-end" style="width: 33%;">
                                        (Signature and Seal)<br>
                                        <strong>Head of the Office</strong>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>`;

                    $('#report-collectedAmount').html(html);
                    
                } else {
                    $('#report-collectedAmount').html('<div class="text-danger text-center py-3">No data found for this selection.</div>');
                }
            },
            error: function () {
                $('#report-collectedAmount').html('<div class="text-danger text-center py-3">Failed to load data. Please try again.</div>');
            }
        });
    });

    $('#sector_wise').on('click', function () {
        const billCycleCode = $('#month_id').val();
        const locationCode = $('#location_id').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).data('route');

        hideAllReports();

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: csrfToken,
                bill_cycle_code: billCycleCode,
                location_code: locationCode
            },
            beforeSend: function () {
                $('#report-sectorWise')
                    .removeClass('d-none')
                    .html('<div class="text-center text-muted py-3">Loading Summary Report...</div>');
            },
            success: function (response) {
                console.log(response);
                
                if (response.length > 0) {
                    const officeName = response[0]?.LOCATION_NAME ?? '';
                    const officeCode = response[0]?.LOCATION_CODE ?? '';
                    const fullOfficeName = `${officeName} (${officeCode})`;
                    
                    const circleName = response[0]?.CIRCLE_NAME ?? '';
                    const raoName = response[0]?.RAO_NAME ?? '';
              
                    let html = `
                    <div class="d-flex justify-content-start my-3">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                    </div>
                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">Bangladesh Power Development Board</h3>
                            <p><strong>Bill Cycle:</strong> ${$('#month_id option:selected').text()}</p>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h6><strong>Name of the Office :</strong> ${fullOfficeName}</h6>
                                <h6><strong>Name of the Circle :</strong> ${circleName}</h6>
                                <h6><strong>Name of the RAO :</strong> ${raoName}</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table1 table-bordered text-center align-middle">
                                <thead>
                                    <tr class="align-middle">
                                        <th rowspan="2" width="30%">Sector Name</th>
                                        <th colspan="2">Current Month</th>
                                        <th rowspan="2">Collected Amount (Taka)</th>
                                        <th rowspan="2">Receivable Amount (Taka)</th>  
                                        <th rowspan="2">Equivalent Month</th>
                                    </tr>
                                    <tr class="align-middle">
                                        <th>Previous Amount Receivable (Taka)</th>
                                        <th>Billed Amount (Taka)</th>
                                    </tr>
                                </thead>
                            <tbody>`;

                                $.each(response, function (index, item) {
                                    html += `<tr>
                                        <td width="30%">${item.SECT_NAME ?? ''}</td>
                                        <td>${item.AMT_RECV_PREV_MONTH ?? ''}</td>
                                        <td>${item.CUR_MONTH_BILLED_AMT ?? ''}</td>
                                        <td>${item.CUR_MONTH_COL_AMT ?? ''}</td>
                                        <td>${item.AMT_RECV_CUR_MONTH ?? ''}</td>
                                        <td>${item.EQM ?? ''}</td>
                                    </tr>`;
                                });

                                html += `
                                </tbody>
                            </table>
                            <div class="mt-5">
                                <table class="w-100">
                                    <tr>
                                        <td class="text-start" style="width: 33%;">Prepared By</td>
                                        <td class="text-center" style="width: 33%;">Checked By</td>
                                        <td class="text-end" style="width: 33%;">
                                            (Signature and Seal)<br>
                                            <strong>Head of the Office</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>`;

                    $('#report-sectorWise').html(html);
                    
                } else {
                    $('#report-sectorWise').html('<div class="text-danger text-center py-3">No data found for this selection.</div>');
                }
            },
            error: function () {
                $('#report-sectorWise').html('<div class="text-danger text-center py-3">Failed to load data. Please try again.</div>');
            }
        });
    });

    function hideAllReports() {
        $('.report-box').addClass('d-none').html('');
    }
});
function printTable() {
    const content = document.getElementById('printableArea').innerHTML;
    const myWindow = window.open('', '_blank', 'width=900,height=700');

    if (!myWindow) {
        alert('Popup blocked. Please allow popups for this site.');
        return;
    }

    myWindow.document.write('<html><head><title>Print Report</title>');
    myWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">');

    // Optional: Add print CSS
    myWindow.document.write(`
        <style>
            @media print {
                @page { size: A4 landscape; margin: 5mm; }
                .table1 table, .table1 th, .table1 td, .table2 table, .table2 th, .table2 td {
                    border: 1px solid #000 !important;
                    color: #000 !important;
                    font-size: 10px !important;
                    padding: 3px 1px !important;
                }
                h3{
                    font-size: 1.3125rem !important
                }h5{
                    font-size: .875rem !important;
                    margin-bottom: .2rem;
                }
                h6{
                    font-size: .875rem !important;
                    margin-bottom: .2rem;
                }
                .page-break {
                    page-break-before: always;
                }
            }
        </style>
    `);

    myWindow.document.write('</head><body>');
    myWindow.document.write(content);
    myWindow.document.write('</body></html>');

    myWindow.document.close();
    myWindow.focus();

    // Wait a bit before printing
    myWindow.onload = function () {
        myWindow.print();
        myWindow.onafterprint = () => {
            myWindow.close();
        };
    };
}


