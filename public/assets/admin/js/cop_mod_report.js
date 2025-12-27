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
            
                if (response.data && response.data.length > 0) {
                    const row = response.data[0]; // only one office's summary
                    const officeName = row.OFFICE_NAME ?? '';
                    const circleName = row.CIRCLE_NAME ?? '';
                    const raoName    = row.RAO_NAME ?? '';
                    const curMonth   = row.CUR_MONTH_LABEL ?? '';
                    const preMonth   = row.PRE_MONTH_LABEL ?? '';

                    // mapping from field key → label
                    const itemMapping = {
                        "NO_OF_CUST": "Number of Consumers",
                        "NO_OF_BILLED_CUST": "Number of Consumer Billed",
                        "NET_IMPORT_KWH": "Net Energy Imported (Kwh)",
                        "NET_GEN_KWH": "Net Energy Generated (Kwh)",
                        "NET_IMPORT_KWH": "Total Energy Import (3+4) (Kwh)",
                        "BILLED_UNIT": "Total Energy Sold to Consumer (Kwh)",
                        "ENERGY_LOST": "Energy Lost (S+D+V)",
                        "SYS_LOSS": "System Loss(%)",
                        "NET_BILLED_AMT": "Net Billed Amount (Tk)",
                        "TOTAL_LPS_BILLED_AMT": "Total LPS Billed Amount (Tk)",
                        "GROSS_BILLED_AMT": "Gross Billed Amount (Tk)",
                        "NET_COLL_AMT": "Net Collected Amount (Tk)",
                        "TOTAL_LPS_COLL_AMT": "Total LPS Collected Amount (Tk)",
                        "GROSS_COLL_AMT": "Total Gross Collected Amount (Tk)",
                        "POSTPAID_NET_BILLED_AMT": "Net Post Paid Billed Amt",
                        "PREPAID_NET_BILLED_AMT": "Net Pre Paid Billed Amt",
                        "CB_RATIO": "CB Ratio %",
                        "NET_AC_REC": "Net A/C Receivable (Tk)",
                        "NET_AC_REC_LPS": "Net A/C Receivable LPS (Tk)",
                        "EQ_MONTH": "Equivalent Month",
                        "BILLING_RATE": "BPDB Billing Rate (Tk/Kwh)",
                        "PFC": "PFC",
                        "DCS_COLL": "DCS Collection (Principle) Tk",
                        "PRE_COLL": "Pre-Paid Collection (Tk)",
                        "TOTAL_ADJ_UNIT": "Total Adjusted Energy (Kwh)",
                        "TOTAL_ADJ_AMOUNT": "Total Adjusted Billed Amount (Tk)",
                        "SECURITY_DEPOSIT": "Security Deposit (Tk)"
                    };

                    // number formatter
                    const formatNumber = (num) => {
                        if (num === null || num === undefined || num === "") return "";
                        let n = parseFloat(num);
                        if (isNaN(n)) return num;
                        return n.toLocaleString("en-US");
                    };

                    let html = `
                    <div class="d-flex justify-content-start my-3">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                    </div>
                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">Bangladesh Power Development Board</h3>
                            <h5>MOD Summary for the month of ${curMonth}</h5>
                        </div>

                        <div class="row mb-3">
                            <div class="col-8">
                                <h6 class="mb-1"><strong>Name of the Office :</strong> ${officeName}</h6>
                                <h6 class="mb-1"><strong>Name of the Circle :</strong> ${circleName}</h6>
                                <h6 class="mb-1"><strong>Name of the RAO :</strong> ${raoName}</h6>
                            </div>
                            <div class="col-4 text-end">
                                <h6><strong>COP</strong></h6>
                                <h6><strong>Form : 310/1</strong></h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table1 table-bordered text-center align-middle">
                                <thead class="table-secondary">
                                    <tr class="align-middle">
                                        <th>Sl.</th>
                                        <th>Items</th>
                                        <th>Current Month</th>
                                        <th>Previous Month</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    let sl = 1;
                    $.each(itemMapping, function (key, label) {
                        let curVal = row[`CUR_${key}`] ?? '';
                        let preVal = row[`PRE_${key}`] ?? '';

                        html += `<tr>
                            <td>${sl++}</td>
                            <td>${label}</td>
                            <td>${curVal}</td>
                            <td>${preVal}</td>
                        </tr>`;
                    });

                    html += `
                                </tbody>
                            </table>
                            <div class="mt-3">
                                <p class="text-dark">Certified that above data are true, correct &amp; based on records.</p>
                            </div>
                            <div class="mt-5">
                                <table class="w-100 text-dark">
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
    
    $('#energy_sold').on('click', function () {
        const billCycleCode = $('#month_id').val();
        const locationCode = $('#location_id').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).data('route');

        hideAllReports();

        console.log(locationCode, 'locationCode');
        
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
                    const officeName = response[0]?.OFFICE_NAME ?? '';
                    const officeCode = response[0]?.LOCATION_CODE ?? '';
                    const fullOfficeName = `${officeName} (${officeCode})`;

                    const circleName = response[0]?.CIRCLE_NAME ?? '';
                    const raoName = response[0]?.RAO_NAME ?? '';
                    const monthLabel = response[0]?.MONTH_LABEL ?? '';

                    
                    let html = `
                    <div class="d-flex justify-content-start my-3">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                    </div>
                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">Bangladesh Power Development Board</h3>
                            <p><strong>MOD Report (Energy Sold) for the month of ${monthLabel}</strong></p>
                        </div>

                        <div class="table-responsive">
                            <div>
                                <h6><strong>Name of the Office :</strong> ${fullOfficeName}</h6>
                                <h6><strong>Name of the Circle :</strong> ${circleName}</h6>
                                <h6><strong>Name of the RAO :</strong> ${raoName}</h6>
                            </div>

                            <table class="table table-bordered text-center align-middle">
                                <thead>
                                    <tr>
                                        <th rowspan="2" colspan="2">Customer Category</th>
                                        <th colspan="3">Post-Paid</th>
                                        <th colspan="3">Pre-Paid</th>
                                        <th colspan="3">Total</th>
                                    </tr>
                                    <tr>
                                        <th>No of Con</th>
                                        <th>No of Billed Cons</th>
                                        <th>Billed Unit</th>
                                        <th>No of Con</th>
                                        <th>No of Billed Cons</th>
                                        <th>Billed Unit</th>
                                        <th>No of Con</th>
                                        <th>No of Billed Cons</th>
                                        <th>Billed Unit</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>`;

                    // 🔹 Unique category list
                    let categories = [];
                    response.forEach(r => {
                        if (!categories.includes(r.USAGE_CAT_CODE)) {
                            categories.push(r.USAGE_CAT_CODE);
                        }
                    });

                    // 🔹 Loop through each category
                    categories.forEach(cat => {
                        const postpaid = response.find(r => r.USAGE_CAT_CODE === cat && r.PAY_TYPE === "POSTPAID") || {};
                        const prepaid  = response.find(r => r.USAGE_CAT_CODE === cat && r.PAY_TYPE === "PREPAID") || {};
                        const total    = response.find(r => r.USAGE_CAT_CODE === cat && r.PAY_TYPE === "ALL") || {};

                        html += `
                            <tr>
                                <td>${postpaid.USAGE_CAT_NAME || prepaid.USAGE_CAT_NAME || total.USAGE_CAT_NAME || ''}</td>
                                <td>${cat}</td>

                                <td class="text-end">${postpaid.TOT_CONS || 0}</td>
                                <td class="text-end">${postpaid.BILLED_CONS || 0}</td>
                                <td class="text-end">${postpaid.BILLED_UNIT || 0}</td>

                                <td class="text-end">${prepaid.TOT_CONS || 0}</td>
                                <td class="text-end">${prepaid.BILLED_CONS || 0}</td>
                                <td class="text-end">${prepaid.BILLED_UNIT || 0}</td>

                                <td class="text-end">${total.TOT_CONS || 0}</td>
                                <td class="text-end">${total.BILLED_CONS || 0}</td>
                                <td class="text-end">${total.BILLED_UNIT || 0}</td>
                            </tr>`;
                    });

                    html += `
                                </tbody>
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
                    .html('<div class="text-center text-muted py-3">Loading Bill Report...</div>');
            },
            success: function (response) {

                // number formatter (PDF-like)
                const fmt = (v) => {
                    if (v === null || v === undefined || v === '') return '0.00';
                    const n = Number(v);
                    if (Number.isNaN(n)) return v;
                    return n.toLocaleString('en-BD', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                };

                // ✅ new response structure
                const billedAmount = response?.billedAmount || [];
                const miscBill = response?.miscBill || [];

                if (!billedAmount || billedAmount.length === 0) {
                    $('#report-billedAmount')
                        .html('<div class="text-danger text-center py-3">No data found for this selection.</div>');
                    return;
                }

                // -------------------------
                // Header info
                // -------------------------
                const officeName = billedAmount[0]?.OFFICE_NAME ?? '';
                const officeCode = billedAmount[0]?.LOCATION_CODE ?? '';
                const fullOfficeName = `${officeName} (${officeCode})`;
                const circleName = billedAmount[0]?.CIRCLE_NAME ?? '';
                const raoName = billedAmount[0]?.RAO_NAME ?? '';
                const monthLabel = billedAmount[0]?.MONTH_LABEL ?? '';

                // -------------------------
                // TP wise data split
                // -------------------------
                const tp1Data = billedAmount.filter(r => String(r.TP) === "1");
                const tp2Data = billedAmount.filter(r => String(r.TP) === "2");

                // TP2 pay-type wise totals
                const tp2Post = tp2Data.find(r => r.PAY_TYPE === "POSTPAID") || {};
                const tp2Pre  = tp2Data.find(r => r.PAY_TYPE === "PREPAID") || {};
                const tp2All  = tp2Data.find(r => r.PAY_TYPE === "ALL") || {};

                let html = `
                    <div class="d-flex justify-content-start my-3">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                    </div>

                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">Bangladesh Power Development Board</h3>
                            <p><strong>MOD Report (Billed Amount) for the month of ${monthLabel}</strong></p>
                        </div>

                        <div class="table-responsive">
                            <div>
                                <h6><strong>Name of the Office :</strong> ${fullOfficeName}</h6>
                                <h6><strong>Name of the Circle :</strong> ${circleName}</h6>
                                <h6><strong>Name of the RAO :</strong> ${raoName}</h6>
                            </div>

                            <!-- =========================
                                MAIN BILLED AMOUNT TABLE
                                ========================= -->
                            <table class="table table-bordered text-center align-middle">
                                <thead>
                                    <tr>
                                        <th rowspan="2" colspan="2">Customer Category</th>
                                        <th colspan="5">Post-Paid</th>
                                        <th colspan="5">Pre-Paid</th>
                                        <th colspan="5">Total</th>
                                    </tr>
                                    <tr>
                                        <th>Net Billed Amt</th>
                                        <th>Billed Unit</th>
                                        <th>BR</th>
                                        <th>Bill Amt (PV.M)</th>
                                        <th>CB</th>

                                        <th>Net Billed Amt</th>
                                        <th>Billed Unit</th>
                                        <th>BR</th>
                                        <th>Bill Amt (PV.M)</th>
                                        <th>CB</th>

                                        <th>Net Billed Amt</th>
                                        <th>Billed Unit</th>
                                        <th>BR</th>
                                        <th>Bill Amt (PV.M)</th>
                                        <th>CB</th>
                                    </tr>
                                </thead>
                                <tbody>
                `;

                // -------------------------
                // Unique categories for TP=1
                // -------------------------
                let categories = [];
                tp1Data.forEach(r => {
                    if (r.USAGE_CAT_CODE && !categories.includes(r.USAGE_CAT_CODE)) {
                        categories.push(r.USAGE_CAT_CODE);
                    }
                });

                // -------------------------
                // Category-wise rows (TP=1)
                // -------------------------
                categories.forEach(cat => {
                    const postpaid = tp1Data.find(r => r.USAGE_CAT_CODE === cat && r.PAY_TYPE === "POSTPAID") || {};
                    const prepaid  = tp1Data.find(r => r.USAGE_CAT_CODE === cat && r.PAY_TYPE === "PREPAID") || {};
                    const total    = tp1Data.find(r => r.USAGE_CAT_CODE === cat && r.PAY_TYPE === "ALL") || {};

                    html += `
                        <tr>
                            <td>${postpaid.USAGE_CAT_NAME || prepaid.USAGE_CAT_NAME || total.USAGE_CAT_NAME || ''}</td>
                            <td>${cat}</td>

                            <td class="text-end">${fmt(postpaid.NET_BILLED_AMT || 0)}</td>
                            <td class="text-end">${fmt(postpaid.BILLED_UNIT || 0)}</td>
                            <td class="text-end">${fmt(postpaid.BILLING_RATE || 0)}</td>
                            <td class="text-end">${fmt(postpaid.NET_BILLED_AMT_PV || 0)}</td>
                            <td class="text-end">${fmt(postpaid.CI_RATIO || 0)}</td>

                            <td class="text-end">${fmt(prepaid.NET_BILLED_AMT || 0)}</td>
                            <td class="text-end">${fmt(prepaid.BILLED_UNIT || 0)}</td>
                            <td class="text-end">${fmt(prepaid.BILLING_RATE || 0)}</td>
                            <td class="text-end">${fmt(prepaid.NET_BILLED_AMT_PV || 0)}</td>
                            <td class="text-end">${fmt(prepaid.CI_RATIO || 0)}</td>

                            <td class="text-end">${fmt(total.NET_BILLED_AMT || 0)}</td>
                            <td class="text-end">${fmt(total.BILLED_UNIT || 0)}</td>
                            <td class="text-end">${fmt(total.BILLING_RATE || 0)}</td>
                            <td class="text-end">${fmt(total.NET_BILLED_AMT_PV || 0)}</td>
                            <td class="text-end">${fmt(total.CI_RATIO || 0)}</td>
                        </tr>
                    `;
                });

                // -------------------------
                // Footer totals (TP=2) inside SAME table
                // -------------------------
                html += `
                    <tr class="fw-bold" style="background: #ffc7c7;">
                        <td colspan="2" class="text-end">Total (Principal)</td>

                        <td class="text-end">${fmt(tp2Post.NET_BILLED_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2Post.BILLED_UNIT || 0)}</td>
                        <td class="text-end">${fmt(tp2Post.BILLING_RATE || 0)}</td>
                        <td class="text-end">${fmt(tp2Post.NET_BILLED_AMT_PV || 0)}</td>
                        <td class="text-end">${fmt(tp2Post.CI_RATIO || 0)}</td>

                        <td class="text-end">${fmt(tp2Pre.NET_BILLED_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2Pre.BILLED_UNIT || 0)}</td>
                        <td class="text-end">${fmt(tp2Pre.BILLING_RATE || 0)}</td>
                        <td class="text-end">${fmt(tp2Pre.NET_BILLED_AMT_PV || 0)}</td>
                        <td class="text-end">${fmt(tp2Pre.CI_RATIO || 0)}</td>

                        <td class="text-end">${fmt(tp2All.NET_BILLED_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2All.BILLED_UNIT || 0)}</td>
                        <td class="text-end">${fmt(tp2All.BILLING_RATE || 0)}</td>
                        <td class="text-end">${fmt(tp2All.NET_BILLED_AMT_PV || 0)}</td>
                        <td class="text-end">${fmt(tp2All.CI_RATIO || 0)}</td>
                    </tr>

                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total (LPS)</td>

                        <td class="text-end">${fmt(tp2Post.TOTAL_LPS_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>

                        <td class="text-end">${fmt(tp2Pre.TOTAL_LPS_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>

                        <td class="text-end">${fmt(tp2All.TOTAL_LPS_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>
                    </tr>

                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total (Misc Bill)</td>

                        <td class="text-end">${fmt(tp2Post.TOTAL_MISC_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>

                        <td class="text-end">${fmt(tp2Pre.TOTAL_MISC_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>

                        <td class="text-end">${fmt(tp2All.TOTAL_MISC_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>
                    </tr>

                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total (Gross Bill)</td>

                        <td class="text-end">${fmt(tp2Post.GROSS_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>

                        <td class="text-end">${fmt(tp2Pre.GROSS_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>

                        <td class="text-end">${fmt(tp2All.GROSS_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>
                    </tr>

                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total (VAT)</td>

                        <td class="text-end">${fmt(tp2Post.TOTAL_VAT_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>

                        <td class="text-end">${fmt(tp2Pre.TOTAL_VAT_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>

                        <td class="text-end">${fmt(tp2All.TOTAL_VAT_BILLED_AMT || 0)}</td>
                        <td colspan="4"></td>
                    </tr>

                </tbody>
            </table>
                `;

                // =========================
                // MISC BILL TABLE (exact structure)
                // TP=1 rows + TP=2 Total row
                // =========================
                if (miscBill && miscBill.length > 0) {

                    // TP=1 rows only
                    const miscTp1 = miscBill.filter(r => String(r.TP) === "1");

                    // ✅ only rows where billed amount > 0
                    const miscPositive = miscTp1.filter(r => Number(r.MISC_AMT_BILLED || 0) > 0);

                    // যদি একটাও পজিটিভ না থাকে তাহলে টেবিলই দেখাবেন না
                    if (miscPositive.length > 0) {

                        html += `
                            <div class="mt-4" style="width: 520px;">
                                <h6 class="fw-bold mb-2">Misc Bill</h6>
                                <table class="table table-bordered text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th>Bil Type</th>
                                            <th class="text-end">Billed Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        `;

                        miscPositive.forEach(row => {
                            html += `
                                <tr>
                                    <td class="text-start">${row.MSC_BILL_TYPE_NAME ?? ''}</td>
                                    <td class="text-end">${fmt(row.MISC_AMT_BILLED)}</td>
                                </tr>
                            `;
                        });

                        html += `
                                    </tbody>
                                </table>
                            </div>
                        `;
                    }
                }

                // close wrappers
                html += `
                        </div> <!-- table-responsive -->
                    </div> <!-- printableArea -->
                `;

                $('#report-billedAmount').html(html);
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
                    .html('<div class="text-center text-muted py-3">Loading Collected Amount Report...</div>');
            },
            success: function (response) {

                // number formatter
                const fmt = (v) => {
                    if (v === null || v === undefined || v === '') return '0.00';
                    const n = Number(v);
                    if (Number.isNaN(n)) return v;
                    return n.toLocaleString('en-BD', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                };

                // ✅ new response structure
                const collectedAmount = response?.colletedAmount || [];
                const miscBill = response?.miscBill || [];

                if (!collectedAmount || collectedAmount.length === 0) {
                    $('#report-collectedAmount')
                        .html('<div class="text-danger text-center py-3">No data found for this selection.</div>');
                    return;
                }

                // -------------------------
                // Header info
                // -------------------------
                const officeName = collectedAmount[0]?.OFFICE_NAME ?? '';
                const officeCode = collectedAmount[0]?.LOCATION_CODE ?? '';
                const fullOfficeName = `${officeName} (${officeCode})`;

                const circleName = collectedAmount[0]?.CIRCLE_NAME ?? '';
                const raoName = collectedAmount[0]?.RAO_NAME ?? '';
                const monthLabel = collectedAmount[0]?.MONTH_LABEL ?? '';

                // -------------------------
                // TP wise split
                // -------------------------
                const tp1Data = collectedAmount.filter(r => String(r.TP) === "1");
                const tp2Data = collectedAmount.filter(r => String(r.TP) === "2");

                // TP2 totals (pay-type wise)
                const tp2Post = tp2Data.find(r => r.PAY_TYPE === "POSTPAID") || {};
                const tp2Pre  = tp2Data.find(r => r.PAY_TYPE === "PREPAID") || {};
                const tp2All  = tp2Data.find(r => r.PAY_TYPE === "ALL") || {};

                let html = `
                    <div class="d-flex justify-content-start my-3">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                    </div>

                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">Bangladesh Power Development Board</h3>
                            <p><strong>MOD Report (Collection Amount) for the month of ${monthLabel}</strong></p>
                        </div>

                        <div class="table-responsive">
                            <div>
                                <h6><strong>Name of the Office :</strong> ${fullOfficeName}</h6>
                                <h6><strong>Name of the Circle :</strong> ${circleName}</h6>
                                <h6><strong>Name of the RAO :</strong> ${raoName}</h6>
                            </div>

                            <!-- =========================
                                MAIN COLLECTION TABLE
                                ========================= -->
                            <table class="table table-bordered text-center align-middle">
                                <thead>
                                    <tr>
                                        <th rowspan="2" colspan="2">Customer Category</th>
                                        <th>Post-Paid</th>
                                        <th>Pre-Paid</th>
                                        <th>Total</th>
                                    </tr>
                                    <tr>
                                        <th>Net Collected Amt</th>
                                        <th>Net Collected Amt</th>
                                        <th>Net Collected Amt</th>
                                    </tr>
                                </thead>
                                <tbody>
                `;

                // -------------------------
                // Unique categories from TP=1 (ignore null)
                // -------------------------
                let categories = [];
                tp1Data.forEach(r => {
                    if (r.USAGE_CAT_CODE && !categories.includes(r.USAGE_CAT_CODE)) {
                        categories.push(r.USAGE_CAT_CODE);
                    }
                });

                // -------------------------
                // TP=1 Category wise rows
                // -------------------------
                categories.forEach(cat => {
                    const postpaid = tp1Data.find(r => r.USAGE_CAT_CODE === cat && r.PAY_TYPE === "POSTPAID") || {};
                    const prepaid  = tp1Data.find(r => r.USAGE_CAT_CODE === cat && r.PAY_TYPE === "PREPAID") || {};
                    const total    = tp1Data.find(r => r.USAGE_CAT_CODE === cat && r.PAY_TYPE === "ALL") || {};

                    html += `
                        <tr>
                            <td>${postpaid.USAGE_CAT_NAME || prepaid.USAGE_CAT_NAME || total.USAGE_CAT_NAME || ''}</td>
                            <td>${cat}</td>
                            <td class="text-end">${fmt(postpaid.NET_COLL_AMT || 0)}</td>
                            <td class="text-end">${fmt(prepaid.NET_COLL_AMT || 0)}</td>
                            <td class="text-end">${fmt(total.NET_COLL_AMT || 0)}</td>
                        </tr>
                    `;
                });

                // -------------------------
                // TP=2 Footer totals (same table bottom)
                // -------------------------
                html += `
                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total (Prin Coll)</td>
                        <td class="text-end">${fmt(tp2Post.NET_COLL_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2Pre.NET_COLL_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2All.NET_COLL_AMT || 0)}</td>
                    </tr>

                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total (LPS Coll)</td>
                        <td class="text-end">${fmt(tp2Post.TOTAL_LPS_COLL_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2Pre.TOTAL_LPS_COLL_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2All.TOTAL_LPS_COLL_AMT || 0)}</td>
                    </tr>

                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total (Misc Coll)</td>
                        <td class="text-end">${fmt(tp2Post.TOTAL_MISC_COLL_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2Pre.TOTAL_MISC_COLL_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2All.TOTAL_MISC_COLL_AMT || 0)}</td>
                    </tr>

                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total (Gross Coll)</td>
                        <td class="text-end">${fmt(tp2Post.GROSS_COLL_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2Pre.GROSS_COLL_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2All.GROSS_COLL_AMT || 0)}</td>
                    </tr>

                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total (VAT Coll)</td>
                        <td class="text-end">${fmt(tp2Post.TOTAL_VAT_COLL_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2Pre.TOTAL_VAT_COLL_AMT || 0)}</td>
                        <td class="text-end">${fmt(tp2All.TOTAL_VAT_COLL_AMT || 0)}</td>
                    </tr>
                `;

                html += `
                                </tbody>
                            </table>
                `;

                // =========================
                // MISC COLLECTION TABLE
                // show only if MISC_AMT_COLL > 0
                // =========================
                if (miscBill && miscBill.length > 0) {

                    const miscTp1 = miscBill.filter(r => String(r.TP) === "1");
                    const miscTp2 = miscBill.find(r => String(r.TP) === "2") || {};

                    // ✅ only positive collected rows
                    const miscPositive = miscTp1.filter(r => Number(r.MISC_AMT_COLL || 0) > 0);

                    if (miscPositive.length > 0 || Number(miscTp2.MISC_AMT_COLL || 0) > 0) {

                        html += `
                            <div class="mt-4" style="width: 520px;">
                                <h6 class="fw-bold mb-2">Misc Collection</h6>
                                <table class="table table-bordered text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th>Bil Type</th>
                                            <th class="text-end">Collected Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        `;

                        miscPositive.forEach(row => {
                            html += `
                                <tr>
                                    <td class="text-start">${row.MSC_BILL_TYPE_NAME ?? ''}</td>
                                    <td class="text-end">${fmt(row.MISC_AMT_COLL || 0)}</td>
                                </tr>
                            `;
                        });

                        // TP=2 total row (DB summed)
                        if (Number(miscTp2.MISC_AMT_COLL || 0) > 0) {
                            html += `
                                <tr class="fw-bold">
                                    <td class="text-end">${miscTp2.MSC_BILL_TYPE_NAME ?? 'Total :'}</td>
                                    <td class="text-end">${fmt(miscTp2.MISC_AMT_COLL || 0)}</td>
                                </tr>
                            `;
                        }

                        html += `
                                    </tbody>
                                </table>
                            </div>
                        `;
                    }
                }

                // close wrappers
                html += `
                        </div>
                    </div>
                `;

                $('#report-collectedAmount').html(html);
            },
            error: function () {
                $('#report-collectedAmount').html('<div class="text-danger text-center py-3">Failed to load data. Please try again.</div>');
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
                    .html('<div class="text-center text-muted py-3">Loading Account Receivable Report...</div>');
            },
            success: function (response) {
                const fmt = (v) => {
                    if (v === null || v === undefined || v === '') return '0';
                    const n = Number(v);
                    if (Number.isNaN(n)) return v; 
                    return n.toLocaleString('en-BD', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                };

                if (!response || response.length === 0) {
                    $('#report-accountReceivable')
                        .html('<div class="text-danger text-center py-3">No data found for this selection.</div>');
                    return;
                }

                // -------------------------
                // Header info
                // -------------------------
                const officeName = response[0]?.OFFICE_NAME ?? '';
                const officeCode = response[0]?.LOCATION_CODE ?? '';
                const fullOfficeName = `${officeName} (${officeCode})`;
                const circleName = response[0]?.CIRCLE_NAME ?? '';
                const raoName = response[0]?.RAO_NAME ?? '';
                const monthLabel = response[0]?.MONTH_LABEL ?? $('#month_id option:selected').text();

                // -------------------------
                // TP split
                // -------------------------
                const tp1Data = response.filter(r => String(r.TP) === "1");
                const tp2Data = response.filter(r => String(r.TP) === "2");

                // TP=2 summary row (single)
                const tp2 = tp2Data[0] || {};

                let html = `
                    <div class="d-flex justify-content-start my-3">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                    </div>

                    <div id="printableArea">
                        <div class="text-center my-4">
                            <h3 class="fw-bold">Bangladesh Power Development Board</h3>
                            <p><strong>MOD Report (Net Receivable) as on ${monthLabel}</strong></p>
                        </div>

                        <div class="table-responsive">
                            <div>
                                <h6><strong>Name of the Office :</strong> ${fullOfficeName}</h6>
                                <h6><strong>Name of the Circle :</strong> ${circleName}</h6>
                                <h6><strong>Name of the RAO :</strong> ${raoName}</h6>
                            </div>

                            <table class="table table-bordered text-center align-middle">
                                <thead>
                                    <tr class="align-middle">
                                        <th width="5%">Sl No</th>
                                        <th width="30%">Customer Category</th>
                                        <th width="10%">Category</th>
                                        <th class="text-end">Opn Net Rec Bill</th>
                                        <th class="text-end">Net Billed Amt</th>
                                        <th class="text-end">Net Coll Amt</th>
                                        <th class="text-end">Close Net Ac Rec</th>
                                        <th class="text-end">EQ Month</th>
                                    </tr>
                                </thead>
                                <tbody>
                `;

                // -------------------------
                // TP=1 rows (category-wise)
                // -------------------------
                tp1Data.forEach((item, idx) => {
                    html += `
                        <tr>
                            <td>${item.SL_NO ?? (idx + 1)}</td>
                            <td class="text-start">${item.USAGE_CAT_NAME ?? ''}</td>
                            <td>${item.USAGE_CAT_CODE ?? ''}</td>

                            <td class="text-end">${fmt(item.OPN_NET_AC_REC)}</td>
                            <td class="text-end">${fmt(item.NET_BILLED_AMT)}</td>
                            <td class="text-end">${fmt(item.NET_COLL_AMT)}</td>
                            <td class="text-end">${fmt(item.NET_AC_REC)}</td>
                            <td class="text-end">${fmt(item.EQ_MONTH)}</td>
                        </tr>
                    `;
                });

                // -------------------------
                // TP=2 Footer totals (PDF style)
                // Total (Prin), Total (LPS), Total (VAT)
                // -------------------------
                html += `
                    <tr class="fw-bold">
                        <td colspan="3" class="text-end">Total (Prin):</td>
                        <td class="text-end">${fmt(tp2.OPN_NET_AC_REC)}</td>
                        <td class="text-end">${fmt(tp2.NET_BILLED_AMT)}</td>
                        <td class="text-end">${fmt(tp2.NET_COLL_AMT)}</td>
                        <td class="text-end">${fmt(tp2.NET_AC_REC)}</td>
                        <td class="text-end">${fmt(tp2.EQ_MONTH)}</td>
                    </tr>

                    <tr class="fw-bold">
                        <td colspan="3" class="text-end">Total (LPS):</td>
                        <td class="text-end">${fmt(tp2.OPN_NET_AC_REC_LPS)}</td>
                        <td class="text-end">${fmt(tp2.TOTAL_LPS_BILLED_AMT)}</td>
                        <td class="text-end">${fmt(tp2.TOTAL_LPS_COLL_AMT)}</td>
                        <td class="text-end">${fmt(tp2.NET_AC_REC_LPS)}</td>
                        <td></td>
                    </tr>

                    <tr class="fw-bold">
                        <td colspan="3" class="text-end">Total (VAT):</td>
                        <td class="text-end">${fmt(tp2.OPN_NET_AC_REC_VAT)}</td>
                        <td class="text-end">${fmt(tp2.TOTAL_VAT_BILLED_AMT)}</td>
                        <td class="text-end">${fmt(tp2.TOTAL_VAT_COLL_AMT)}</td>
                        <td class="text-end">${fmt(tp2.NET_AC_REC_VAT)}</td>
                        <td></td>
                    </tr>
                `;

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
                    </div>
                `;

                $('#report-accountReceivable').html(html);
            },

            error: function () {
                $('#report-accountReceivable').html('<div class="text-danger text-center py-3">Failed to load data. Please try again.</div>');
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
                @page { size: A4; margin: 5mm; } /* portrait by default */
                .table1 table, .table1 th, .table1 td, .table2 table, .table2 th, .table2 td {
                    border: 1px solid #000 !important;
                    color: #000 !important;
                    font-size: 10px !important;
                    padding: 3px 1px !important;
                }
                h3 {
                    font-size: 1.3125rem !important;
                }
                h5 {
                    font-size: .875rem !important;
                    margin-bottom: .2rem;
                }
                h6 {
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



