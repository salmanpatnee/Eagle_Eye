<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool">
    <meta name="description" content="Zain Cloud GRC Tool">
    <!-- Boxicons Icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        * {
            margin: 0em;
        }

        body {
            background-color: white;
        }

        .headersec {
            display: flex;
            justify-content: space-between;
            background: linear-gradient(to right, #203864, #2e74b6);
            padding: 20px 0px 10px 0px;
            margin: 0px 0px 0px 0px;
            width: 100%;
            height: 50px;
            z-index: 1;
        }

        .headerleft {
            display: flex;
            justify-content: left;
            margin: 0px 0px 0px 50px;
            color: white;
            font-weight: 800;
            align-items: center;

        }

        .headericon {
            font-size: 30px;
        }

        .headertext {
            font-size: 18px;
            line-height: 18px;
        }

        .headericon,
        .headertext {
            margin-right: 10px;
        }

        .button {
            background-color: black;
            color: white;
            padding: 0px 50px 0px 50px;
            margin: 0px 56px 0px 0px;
            border: solid 1px black;
            border-radius: 10px;
            transition: 0.3s;
            font-size: 12px;
            width: auto;
            height: 50px;
        }

        .button:hover {
            background-color: white;
            color: black;
        }

        .bodysec {
            padding-inline: 20px;
        }

        .domainsec {
            border: solid 2px black;
            border-radius: 20px;
            padding: 0px;
            margin-block: 30px;
        }

        .domainsechead {
            font-size: 15px;
            text-align: center;
            padding-bottom: 30px;
            background-color: #99bbe0;
            border-radius: 20px 20px 0px 0px;
            padding-block: 10px;
            margin-bottom: 30px
        }

        .domainsecbutton {
            display: flex;
            justify-content: space-between;
            padding-inline: 30px;
            margin-bottom: 20px
        }

        .threebutton {
            padding: 20px 0px 10px 0px;
            color: white;
            font-size: 15px;
            background-color: #203864;
            width: 250px;
            height: 70px;
            text-align: center;
            border-radius: 20px;
            transition: 0.3s;
            align-items: center;
        }

        .threebutton:hover {
            background-color: #2e74b6;
            transform: scale(1.1);
            box-shadow: 2px 2px 4px #000000;
            ;
        }

        .threebutton p {
            padding-block: 3px;
        }

        a {
            text-decoration: none;
        }

        .misherosec {
            text-align: center;
            padding: 30px;
            background-color: #99bbe0;
            /* height: 140px; */
            width: auto;
        }

        .mhshead {
            margin-bottom: 10px;
            line-height: 25px;
        }

        .mhsbutton {
    background-color: #203864;
    max-width: 300px;
    border-radius: 10px;
    /* margin-inline: 420px; */
    /* padding-block: 10px; */
    line-height: 25px;
    transition: 0.3s;
    margin: auto;
    padding: 20px;
    width: 260px;
}

        .mhsbutton:hover {
            transform: scale(1.1);
        }

        .mhsbutton a {
            text-decoration: none;
            color: white;
        }

        .flex {
            display: flex;
        }
        .justify-center {
    justify-items: center;
}
.align-center {
    align-items: center;
}
    </style>
</head>

<body>
    <div class="headersec">
        <div class="headerleft">
            <div class="headericon">
                <a href="/compliance" style="color: white">
                    <i class='bx bx-home'></i>
                </a>

            </div>
            <div class="headertext">
                <p>العمليات</p>
                <p>Processes</p>
            </div>
            <div class="headericon">
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            <div class="headertext">
                <p>تقارير نظم المعلومات الإدارية</p>
                <p>Management Information System Reports</p>
            </div>
        </div>
        <div class="d-flex align-items-center  gap-3">

            @include('partials.roles')
            <div class="headerright">
                <button type="button" class="button" onclick="goBack()">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>
            </div>
        </div>
    </div>
    <div class="misherosec">
        <div>
            <div class="mhshead">
                {{-- <h3>أكمل تقرير الأصول الذكية</h3>
                <h3>Complete Asset Smart Report</h3> --}}
            </div>
            <div class="flex justify-center align-center">
                <div class="mhsbutton">
                    <a href="/asset-smart-search">
                        <div>
                            <p>البحث الذكي عن الأصول</p>
                            <p>Asset Smart Search</p>
                        </div>
                    </a>
                </div>
                <div class="mhsbutton">
                    <a href="{{route('mbe.index')}}">
                        <div>
                            <p>إدارة بواسطة الاستثناءات
                            </p>
                            <p>Management by Exceptions (MBE)</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bodysec">
        <div class="domainsec">
            <div class="domainsechead">
                <h2>الأصول الحساسة</h2>
                <h2>Critical Assets</h2>
            </div>
            <div class="domainsecbutton">
                <a href="/list-critical-assets">
                    <div class="threebutton">
                        <p>قائمة الأصول الحساسة</p>
                        <p>List of Critical Assets</p>
                    </div>
                </a>
                <a href="/risk-critical-assets">
                    <div class="threebutton">
                        <p>المخاطر المتعلقة بالأصول الحساسة</p>
                        <p>Risk Related to Critical Assets</p>
                    </div>
                </a>
                <a href="/control-critical-assets">
                    <div class="threebutton">
                        <p>الضوابط المتعلقة بالأصول الحساسة</p>
                        <p>Controls Related to Critical Assets</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="domainsec">
            <div class="domainsechead">
                <h2>الأصول السحابية</h2>
                <h2>Cloud Assets</h2>
            </div>
            <div class="domainsecbutton">
                <a href="/list-cloud-assets">
                    <div class="threebutton">
                        <p>قائمة الأصول السحابية</p>
                        <p>List of Cloud Assets</p>
                    </div>
                </a>
                <a href="/risk-cloud-assets">
                    <div class="threebutton">
                        <p>المخاطر المتعلقة بالأصول السحابية</p>
                        <p>Risk Related to Cloud Assets</p>
                    </div>
                </a>
                <a href="/control-cloud-assets">
                    <div class="threebutton">
                        <p>التحكم المتعلق بالأصول السحابية</p>
                        <p>Control Related to Cloud Assets</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="domainsec">
            <div class="domainsechead">
                <h2>أصول العمل عن بعد</h2>
                <h2>Telework Assets</h2>
            </div>
            <div class="domainsecbutton">
                <a href="/list-telework-assets">
                    <div class="threebutton">
                        <p>قائمة أصول العمل عن بعد</p>
                        <p>List of Telework Assets</p>
                    </div>
                </a>
                <a href="/risk-telework-assets">
                    <div class="threebutton">
                        <p>المخاطر المتعلقة بأصول العمل عن بعد</p>
                        <p>Risk Related to Telwrok Assets</p>
                    </div>
                </a>
                <a href="/control-telework-assets">
                    <div class="threebutton">
                        <p>التحكم المتعلق بأصول العمل عن بعد</p>
                        <p>Control Related to Telework</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="domainsec">
            <div class="domainsechead">
                <h2>أصول التواصل الاجتماعي</h2>
                <h2>Social Media Assets</h2>
            </div>
            <div class="domainsecbutton">
                <a href="/list-social-media-assets">
                    <div class="threebutton">
                        <p>قائمة أصول وسائل التواصل الاجتماعي</p>
                        <p>List of Social Media Assets</p>
                    </div>
                </a>
                <a href="/risk-social-media-assets">
                    <div class="threebutton">
                        <p>المخاطر المتعلقة بأصول وسائل التواصل الاجتماعي</p>
                        <p>Risk Related to Social Media Assets</p>
                    </div>
                </a>
                <a href="/control-social-media-assets">
                    <div class="threebutton">
                        <p>السيطرة المتعلقة بأصول وسائل التواصل الاجتماعي</p>
                        <p>Control Related to Social Media Assets</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="domainsec">
            <div class="domainsechead">
                <h2>أصول خصوصية البيانات</h2>
                <h2>Data Privacy Assets</h2>
            </div>
            <div class="domainsecbutton">
                <a href="/control-data-privacy-assets">
                    <div class="threebutton">
                        <p>قائمة أصول خصوصية البيانات</p>
                        <p>List of Data Privacy Assets</p>
                    </div>
                </a>
                <a href="/risk-data-privacy-assets">
                    <div class="threebutton">
                        <p>المخاطر المتعلقة بأصول خصوصية البيانات</p>
                        <p>Risk Rekated to Data Privacy Assets</p>
                    </div>
                </a>
                <a href="/list-data-privacy-assets">
                    <div class="threebutton">
                        <p>الضوابط المتعلقة بأصول خصوصية البيانات</p>
                        <p>Control Related to Data Privacy Assets</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="domainsec">
            <div class="domainsechead">
                <h2>معلومات تحديد الهوية الشخصية الأصول</h2>
                <h2>Personally Identifiable Information Assets</h2>
            </div>
            <div class="domainsecbutton">
                <a href="/list-pii-assets">
                    <div class="threebutton">
                        <p>قائمة أصول المعلومات الشخصية</p>
                        <p>List of Personally Identifiable Information Assets</p>
                    </div>
                </a>
                <a href="/risk-pii-assets">
                    <div class="threebutton">
                        <p>المخاطر المتعلقة بأصول المعلومات الشخصية</p>
                        <p>Risk Rekated to Personally Identifiable Information Assets</p>
                    </div>
                </a>
                <a href="/control-pii-assets">
                    <div class="threebutton">
                        <p>الضوابط المتعلقة بأصول المعلومات الشخصية</p>
                        <p>Control Related to Personally Identifiable Information Assets</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="domainsec">
            <div class="domainsechead">
                <h2>أصول الدفع</h2>
                <h2>Payment Assets</h2>
            </div>
            <div class="domainsecbutton">
                <a href="/list-payment-assets">
                    <div class="threebutton">
                        <p>قائمة أصول الدفع</p>
                        <p>List of Payment Assets</p>
                    </div>
                </a>
                <a href="/risk-payment-assets">
                    <div class="threebutton">
                        <p>المخاطر المتعلقة بأصول الدفع</p>
                        <p>Risk Rekated to Payment Assets</p>
                    </div>
                </a>
                <a href="/control-payment-assets">
                    <div class="threebutton">
                        <p>الضوابط المتعلقة بأصول الدفع</p>
                        <p>Controls Related to Payment Assets</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="domainsec">
            <div class="domainsechead">
                <h2>معيار أمان بيانات صناعة بطاقات الدفع أصول</h2>
                <h2>Payment Card Industry Data Security Standard Assets</h2>
            </div>
            <div class="domainsecbutton">
                <a href="/list-pci-assets">
                    <div class="threebutton">
                        <p>قائمة الأصول القياسية لأمن بيانات صناعة بطاقات الدفع</p>
                        <p>List of PCI DSS Assets</p>
                    </div>
                </a>
                <a href="/risk-pci-assets">
                    <div class="threebutton">
                        <p>المخاطر المتعلقة بالأصول القياسية لأمن بيانات صناعة بطاقات الدفع</p>
                        <p>Risk Rekated to PCI DSS Assets</p>
                    </div>
                </a>
                <a href="/control-pci-assets">
                    <div class="threebutton">
                        <p>الضوابط المتعلقة بالأصول القياسية لأمن بيانات صناعة بطاقات الدفع</p>
                        <p>Control Related to PCI DSS Assets</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="domainsec">
            <div class="domainsechead">
                <h2>أصول التجارة الإلكترونية</h2>
                <h2>E-Commerce Assets</h2>
            </div>
            <div class="domainsecbutton">
                <a href="/list-e-commerce-assets">
                    <div class="threebutton">
                        <p>قائمة أصول التجارة الإلكترونية</p>
                        <p>List of E-Commerce Assets</p>
                    </div>
                </a>
                <a href="/risk-e-commerce-assets">
                    <div class="threebutton">
                        <p>المخاطر المتعلقة بأصول التجارة الإلكترونية</p>
                        <p>Risk Rekated to E-Commerce Assets</p>
                    </div>
                </a>
                <a href="/control-e-commerce-assets">
                    <div class="threebutton">
                        <p>الضوابط المتعلقة بأصول التجارة الإلكترونية</p>
                        <p>Control Related to E-Commerce Assets</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="domainsec">
            <div class="domainsechead">
                <h2>الأصول المصرفية الإلكترونية</h2>
                <h2>E-Banking Assets</h2>
            </div>
            <div class="domainsecbutton">
                <a href="/list-e-banking-assets">
                    <div class="threebutton">
                        <p>قائمة أصول الخدمات المصرفية الإلكترونية</p>
                        <p>List of E-Banking Assets</p>
                    </div>
                </a>
                <a href="/risk-e-banking-assets">
                    <div class="threebutton">
                        <p>المخاطر المتعلقة بأصول الخدمات المصرفية الإلكترونية</p>
                        <p>Risk Rekated to E-Banking Assets</p>
                    </div>
                </a>
                <a href="/control-e-banking-assets">
                    <div class="threebutton">
                        <p>الضوابط المتعلقة بأصول الخدمات المصرفية الإلكترونية</p>
                        <p>Control Related to E-Banking Assets</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
