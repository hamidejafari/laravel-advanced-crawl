@extends("layouts.admin.master")

@section('content')
    <form method="post"  action="{{url('/admin/post-crawl-setting')}}" enctype="multipart/form-data"  >
        {{csrf_field()}}


        <section class="content">
            <div class="container-fluid">
                <div class="col-md-10 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> تنظیمات کرول ریپرتاژ های سایت adsy </h3>
                        </div>
                        <div class="card-body">
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label>Price Range</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="from_price" type="text" class="form-control" placeholder="از"
                                                   value="" >
                                        </div>
                                        <div class="col-md-6">
                                            <input name="to_price" type="text" class="form-control" placeholder="تا"
                                                   value="" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Domain</label>
                                    <input name="domain" type="text" class="form-control" placeholder="ادرس سایت"
                                           value="" >
                                </div>


                                <div class="form-group col-md-6">
                                    <label>DA</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="from_da" type="text" class="form-control" placeholder="از"
                                                   value="" >
                                        </div>
                                        <div class="col-md-6">
                                            <input name="to_da" type="text" class="form-control" placeholder="تا"
                                                   value="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>DR</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="from_dr" type="text" class="form-control" placeholder="از"
                                                   value="" >
                                        </div>
                                        <div class="col-md-6">
                                            <input name="to_dr" type="text" class="form-control" placeholder="تا"
                                                   value="" >
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-4">
                                    <label>Monthly traffic</label>

                                    <select class="form-control" id="select-state" name="traffic" >
                                        <option value="" selected>All</option>
                                        <option value="1">&lt; 10k</option>
                                        <option value="2">10k - 50k</option>
                                        <option value="3">50k - 100k</option>
                                        <option value="4">100k - 200k</option>
                                        <option value="5">200k - 300k</option>
                                        <option value="6">300k - 400k</option>
                                        <option value="7">400k - 500k</option>
                                        <option value="8">500k - 600k</option>
                                        <option value="9">600k - 700k</option>
                                        <option value="10">700k - 800k</option>
                                        <option value="11">800k - 900k</option>
                                        <option value="12">900k - 1M</option>
                                        <option value="13">&gt; 1M</option>
                                    </select>


                                </div>
                                <div class="form-group col-md-4">

                                    <label>Links</label>

                                    <select class="form-control" id="select-state" name="links" >
                                        <option value="" selected>All types</option>
                                        <option value="3">Nofollow</option>
                                        <option value="2">Dofollow</option>
                                    </select>


                                </div>
                                <div class="form-group col-md-4">

                                    <label>Last active</label>

                                    <select class="form-control" id="select-state" name="last_active" >
                                        <option value="" selected>All</option>
                                        <option value="1">This week</option>
                                        <option value="2">Past 2 weeks</option>
                                        <option value="3">Past month</option>
                                    </select>

                                </div>



                                <div class="form-group col-md-4">

                                    <label>Country</label>

                                    <select class="form-control" id="select-state" name="country" >
                                        <option value="" selected>All</option>

                                        <optgroup label="Africa" data-catid="Africa">
                                                <option class="catAfrica" data-catid="Africa" data-content="Algeria" title="Algeria" value="60">
                                                    Algeria                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Angola" title="Angola" value="9">
                                                    Angola                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Benin" title="Benin" value="25">
                                                    Benin                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Botswana" title="Botswana" value="33">
                                                    Botswana                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Burkina Faso" title="Burkina Faso" value="21">
                                                    Burkina Faso                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Burundi" title="Burundi" value="24">
                                                    Burundi                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Cameroon" title="Cameroon" value="45">
                                                    Cameroon                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Cape Verde" title="Cape Verde" value="51">
                                                    Cape Verde                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Central African Republic" title="Central African Republic" value="39">
                                                    Central African Republic                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Chad" title="Chad" value="205">
                                                    Chad                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Comoros" title="Comoros" value="114">
                                                    Comoros                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Congo" title="Congo" value="40">
                                                    Congo                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Congo, the Democratic Republic of the" title="Congo, the Democratic Republic of the" value="38">
                                                    Congo, the Democratic Republic of the                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Cote D'Ivoire" title="Cote D'Ivoire" value="42">
                                                    Cote D'Ivoire                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Djibouti" title="Djibouti" value="56">
                                                    Djibouti                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Egypt" title="Egypt" value="63">
                                                    Egypt                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Equatorial Guinea" title="Equatorial Guinea" value="85">
                                                    Equatorial Guinea                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Eritrea" title="Eritrea" value="65">
                                                    Eritrea                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Ethiopia" title="Ethiopia" value="67">
                                                    Ethiopia                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Gabon" title="Gabon" value="74">
                                                    Gabon                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Gambia" title="Gambia" value="82">
                                                    Gambia                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Ghana" title="Ghana" value="79">
                                                    Ghana                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Guinea" title="Guinea" value="83">
                                                    Guinea                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Guinea-Bissau" title="Guinea-Bissau" value="90">
                                                    Guinea-Bissau                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Kenya" title="Kenya" value="110">
                                                    Kenya                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Lesotho" title="Lesotho" value="127">
                                                    Lesotho                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Liberia" title="Liberia" value="126">
                                                    Liberia                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Libyan Arab Jamahiriya" title="Libyan Arab Jamahiriya" value="131">
                                                    Libyan Arab Jamahiriya                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Madagascar" title="Madagascar" value="135">
                                                    Madagascar                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Malawi" title="Malawi" value="149">
                                                    Malawi                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Mali" title="Mali" value="138">
                                                    Mali                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Mauritania" title="Mauritania" value="144">
                                                    Mauritania                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Mauritius" title="Mauritius" value="147">
                                                    Mauritius                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Mayotte" title="Mayotte" value="236">
                                                    Mayotte                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Morocco" title="Morocco" value="132">
                                                    Morocco                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Mozambique" title="Mozambique" value="152">
                                                    Mozambique                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Namibia" title="Namibia" value="153">
                                                    Namibia                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Niger" title="Niger" value="155">
                                                    Niger                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Nigeria" title="Nigeria" value="157">
                                                    Nigeria                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Reunion" title="Reunion" value="181">
                                                    Reunion                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Rwanda" title="Rwanda" value="184">
                                                    Rwanda                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Saint Helena" title="Saint Helena" value="191">
                                                    Saint Helena                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Sao Tome and Principe" title="Sao Tome and Principe" value="200">
                                                    Sao Tome and Principe                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Senegal" title="Senegal" value="197">
                                                    Senegal                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Seychelles" title="Seychelles" value="187">
                                                    Seychelles                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Sierra Leone" title="Sierra Leone" value="195">
                                                    Sierra Leone                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Somalia" title="Somalia" value="198">
                                                    Somalia                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="South Africa" title="South Africa" value="237">
                                                    South Africa                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Sudan" title="Sudan" value="188">
                                                    Sudan                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Tanzania, United Republic of" title="Tanzania, United Republic of" value="219">
                                                    Tanzania, United Republic of                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Togo" title="Togo" value="207">
                                                    Togo                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Tunisia" title="Tunisia" value="213">
                                                    Tunisia                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Uganda" title="Uganda" value="221">
                                                    Uganda                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Western Sahara" title="Western Sahara" value="64">
                                                    Western Sahara                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Zambia" title="Zambia" value="238">
                                                    Zambia                        </option>
                                                <option class="catAfrica" data-catid="Africa" data-content="Zimbabwe" title="Zimbabwe" value="239">
                                                    Zimbabwe                        </option>
                                            </optgroup>
                                            <optgroup label="Asia" data-catid="Asia">
                                                <option class="catAsia" data-catid="Asia" data-content="Afghanistan" title="Afghanistan" value="3">
                                                    Afghanistan                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Armenia" title="Armenia" value="7">
                                                    Armenia                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Azerbaijan" title="Azerbaijan" value="16">
                                                    Azerbaijan                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Bahrain" title="Bahrain" value="23">
                                                    Bahrain                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Bangladesh" title="Bangladesh" value="19">
                                                    Bangladesh                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Bhutan" title="Bhutan" value="31">
                                                    Bhutan                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Brunei Darussalam" title="Brunei Darussalam" value="27">
                                                    Brunei Darussalam                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Cambodia" title="Cambodia" value="112">
                                                    Cambodia                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="China" title="China" value="46">
                                                    China                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Georgia" title="Georgia" value="77">
                                                    Georgia                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Hong Kong" title="Hong Kong" value="92">
                                                    Hong Kong                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="India" title="India" value="101">
                                                    India                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Indonesia" title="Indonesia" value="98">
                                                    Indonesia                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Iran, Islamic Republic of" title="Iran, Islamic Republic of" value="104">
                                                    Iran, Islamic Republic of                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Iraq" title="Iraq" value="103">
                                                    Iraq                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Israel" title="Israel" value="100">
                                                    Israel                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Japan" title="Japan" value="109">
                                                    Japan                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Jordan" title="Jordan" value="108">
                                                    Jordan                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Kazakhstan" title="Kazakhstan" value="120">
                                                    Kazakhstan                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Korea, Democratic People's Republic of" title="Korea, Democratic People's Republic of" value="116">
                                                    Korea, Democratic People's Republic of                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Korea, Republic of" title="Korea, Republic of" value="117">
                                                    Korea, Republic of                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Kuwait" title="Kuwait" value="118">
                                                    Kuwait                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Kyrgyzstan" title="Kyrgyzstan" value="111">
                                                    Kyrgyzstan                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Lao People's Democratic Republic" title="Lao People's Democratic Republic" value="121">
                                                    Lao People's Democratic Republic                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Lebanon" title="Lebanon" value="122">
                                                    Lebanon                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Macao" title="Macao" value="141">
                                                    Macao                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Malaysia" title="Malaysia" value="151">
                                                    Malaysia                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Maldives" title="Maldives" value="148">
                                                    Maldives                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Mongolia" title="Mongolia" value="140">
                                                    Mongolia                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Myanmar" title="Myanmar" value="139">
                                                    Myanmar                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Nepal" title="Nepal" value="161">
                                                    Nepal                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Oman" title="Oman" value="165">
                                                    Oman                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Pakistan" title="Pakistan" value="171">
                                                    Pakistan                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Palestinian Territory, Occupied" title="Palestinian Territory, Occupied" value="176">
                                                    Palestinian Territory, Occupied                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Philippines" title="Philippines" value="170">
                                                    Philippines                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Qatar" title="Qatar" value="180">
                                                    Qatar                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Saudi Arabia" title="Saudi Arabia" value="185">
                                                    Saudi Arabia                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Singapore" title="Singapore" value="190">
                                                    Singapore                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Sri Lanka" title="Sri Lanka" value="125">
                                                    Sri Lanka                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Syrian Arab Republic" title="Syrian Arab Republic" value="202">
                                                    Syrian Arab Republic                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Taiwan, Province of China" title="Taiwan, Province of China" value="218">
                                                    Taiwan, Province of China                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Tajikistan" title="Tajikistan" value="209">
                                                    Tajikistan                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Thailand" title="Thailand" value="208">
                                                    Thailand                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Timor-Leste" title="Timor-Leste" value="211">
                                                    Timor-Leste                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Turkey" title="Turkey" value="215">
                                                    Turkey                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Turkmenistan" title="Turkmenistan" value="212">
                                                    Turkmenistan                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="United Arab Emirates" title="United Arab Emirates" value="2">
                                                    United Arab Emirates                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Uzbekistan" title="Uzbekistan" value="225">
                                                    Uzbekistan                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Vietnam" title="Vietnam" value="231">
                                                    Vietnam                        </option>
                                                <option class="catAsia" data-catid="Asia" data-content="Yemen" title="Yemen" value="235">
                                                    Yemen                        </option>
                                            </optgroup>
                                            <optgroup label="Australia and Oceania" data-catid="Australia-and-Oceania">
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="American Samoa" title="American Samoa" value="12">
                                                    American Samoa                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Antarctica" title="Antarctica" value="10">
                                                    Antarctica                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Australia" title="Australia" value="14">
                                                    Australia                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Bouvet Island" title="Bouvet Island" value="32">
                                                    Bouvet Island                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="British Indian Ocean Territory" title="British Indian Ocean Territory" value="102">
                                                    British Indian Ocean Territory                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Christmas Island" title="Christmas Island" value="52">
                                                    Christmas Island                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Cocos (Keeling) Islands" title="Cocos (Keeling) Islands" value="37">
                                                    Cocos (Keeling) Islands                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Cook Islands" title="Cook Islands" value="43">
                                                    Cook Islands                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Fiji" title="Fiji" value="69">
                                                    Fiji                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="French Polynesia" title="French Polynesia" value="168">
                                                    French Polynesia                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="French Southern Territories" title="French Southern Territories" value="206">
                                                    French Southern Territories                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Guam" title="Guam" value="89">
                                                    Guam                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Heard Island and Mcdonald Islands" title="Heard Island and Mcdonald Islands" value="93">
                                                    Heard Island and Mcdonald Islands                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Kiribati" title="Kiribati" value="113">
                                                    Kiribati                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Marshall Islands" title="Marshall Islands" value="136">
                                                    Marshall Islands                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Micronesia, Federated States of" title="Micronesia, Federated States of" value="71">
                                                    Micronesia, Federated States of                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Nauru" title="Nauru" value="162">
                                                    Nauru                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Netherlands Antilles" title="Netherlands Antilles" value="8">
                                                    Netherlands Antilles                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="New Caledonia" title="New Caledonia" value="154">
                                                    New Caledonia                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="New Zealand" title="New Zealand" value="164">
                                                    New Zealand                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Niue" title="Niue" value="163">
                                                    Niue                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Norfolk Island" title="Norfolk Island" value="156">
                                                    Norfolk Island                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Northern Mariana Islands" title="Northern Mariana Islands" value="142">
                                                    Northern Mariana Islands                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Palau" title="Palau" value="178">
                                                    Palau                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Papua New Guinea" title="Papua New Guinea" value="169">
                                                    Papua New Guinea                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Pitcairn" title="Pitcairn" value="174">
                                                    Pitcairn                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Samoa" title="Samoa" value="234">
                                                    Samoa                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Solomon Islands" title="Solomon Islands" value="186">
                                                    Solomon Islands                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Swaziland" title="Swaziland" value="203">
                                                    Swaziland                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Tokelau" title="Tokelau" value="210">
                                                    Tokelau                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Tonga" title="Tonga" value="214">
                                                    Tonga                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Tuvalu" title="Tuvalu" value="217">
                                                    Tuvalu                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Vanuatu" title="Vanuatu" value="232">
                                                    Vanuatu                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Virgin Islands, U.s." title="Virgin Islands, U.s." value="230">
                                                    Virgin Islands, U.s.                        </option>
                                                <option class="catAustralia-and-Oceania" data-catid="Australia-and-Oceania" data-content="Wallis and Futuna" title="Wallis and Futuna" value="233">
                                                    Wallis and Futuna                        </option>
                                            </optgroup>
                                            <optgroup label="Central America" data-catid="Central-America">
                                                <option class="catCentral-America" data-catid="Central-America" data-content="Belize" title="Belize" value="35">
                                                    Belize                        </option>
                                                <option class="catCentral-America" data-catid="Central-America" data-content="Costa Rica" title="Costa Rica" value="48">
                                                    Costa Rica                        </option>
                                                <option class="catCentral-America" data-catid="Central-America" data-content="El Salvador" title="El Salvador" value="201">
                                                    El Salvador                        </option>
                                                <option class="catCentral-America" data-catid="Central-America" data-content="Falkland Islands (Malvinas)" title="Falkland Islands (Malvinas)" value="70">
                                                    Falkland Islands (Malvinas)                        </option>
                                                <option class="catCentral-America" data-catid="Central-America" data-content="French Guiana" title="French Guiana" value="78">
                                                    French Guiana                        </option>
                                                <option class="catCentral-America" data-catid="Central-America" data-content="Guatemala" title="Guatemala" value="88">
                                                    Guatemala                        </option>
                                                <option class="catCentral-America" data-catid="Central-America" data-content="Honduras" title="Honduras" value="94">
                                                    Honduras                        </option>
                                                <option class="catCentral-America" data-catid="Central-America" data-content="Nicaragua" title="Nicaragua" value="158">
                                                    Nicaragua                        </option>
                                                <option class="catCentral-America" data-catid="Central-America" data-content="Panama" title="Panama" value="166">
                                                    Panama                        </option>
                                            </optgroup>
                                            <optgroup label="Europe" data-catid="Europe">
                                                <option class="catEurope" data-catid="Europe" data-content="Albania" title="Albania" value="6">
                                                    Albania                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Andorra" title="Andorra" value="1">
                                                    Andorra                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Austria" title="Austria" value="13">
                                                    Austria                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Belarus" title="Belarus" value="34">
                                                    Belarus                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Belgium" title="Belgium" value="20">
                                                    Belgium                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Bosnia and Herzegovina" title="Bosnia and Herzegovina" value="17">
                                                    Bosnia and Herzegovina                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Bulgaria" title="Bulgaria" value="22">
                                                    Bulgaria                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Croatia" title="Croatia" value="95">
                                                    Croatia                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Cyprus" title="Cyprus" value="53">
                                                    Cyprus                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Czech Republic" title="Czech Republic" value="54">
                                                    Czech Republic                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Denmark" title="Denmark" value="57">
                                                    Denmark                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Estonia" title="Estonia" value="62">
                                                    Estonia                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Faroe Islands" title="Faroe Islands" value="72">
                                                    Faroe Islands                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Finland" title="Finland" value="68">
                                                    Finland                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="France" title="France" value="73">
                                                    France                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Germany" title="Germany" value="55">
                                                    Germany                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Gibraltar" title="Gibraltar" value="80">
                                                    Gibraltar                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Greece" title="Greece" value="86">
                                                    Greece                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Holy See (Vatican City State)" title="Holy See (Vatican City State)" value="226">
                                                    Holy See (Vatican City State)                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Hungary" title="Hungary" value="97">
                                                    Hungary                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Iceland" title="Iceland" value="105">
                                                    Iceland                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Ireland" title="Ireland" value="99">
                                                    Ireland                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Italy" title="Italy" value="106">
                                                    Italy                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Latvia" title="Latvia" value="130">
                                                    Latvia                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Liechtenstein" title="Liechtenstein" value="124">
                                                    Liechtenstein                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Lithuania" title="Lithuania" value="128">
                                                    Lithuania                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Luxembourg" title="Luxembourg" value="129">
                                                    Luxembourg                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Macedonia, the Former Yugoslav Republic of" title="Macedonia, the Former Yugoslav Republic of" value="137">
                                                    Macedonia, the Former Yugoslav Republic of                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Malta" title="Malta" value="146">
                                                    Malta                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Moldova, Republic of" title="Moldova, Republic of" value="134">
                                                    Moldova, Republic of                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Monaco" title="Monaco" value="133">
                                                    Monaco                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Netherlands" title="Netherlands" value="159">
                                                    Netherlands                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Norway" title="Norway" value="160">
                                                    Norway                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Poland" title="Poland" value="172">
                                                    Poland                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Portugal" title="Portugal" value="177">
                                                    Portugal                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Romania" title="Romania" value="182">
                                                    Romania                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Russian Federation" title="Russian Federation" value="183">
                                                    Russian Federation                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="San Marino" title="San Marino" value="196">
                                                    San Marino                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Serbia and Montenegro" title="Serbia and Montenegro" value="49">
                                                    Serbia and Montenegro                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Slovakia" title="Slovakia" value="194">
                                                    Slovakia                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Slovenia" title="Slovenia" value="192">
                                                    Slovenia                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="South Georgia and the South Sandwich Islands" title="South Georgia and the South Sandwich Islands" value="87">
                                                    South Georgia and the South Sandwich Islands                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Spain" title="Spain" value="66">
                                                    Spain                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Svalbard and Jan Mayen" title="Svalbard and Jan Mayen" value="193">
                                                    Svalbard and Jan Mayen                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Sweden" title="Sweden" value="189">
                                                    Sweden                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Switzerland" title="Switzerland" value="41">
                                                    Switzerland                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="Ukraine" title="Ukraine" value="220">
                                                    Ukraine                        </option>
                                                <option class="catEurope" data-catid="Europe" data-content="United Kingdom" title="United Kingdom" value="75">
                                                    United Kingdom                        </option>
                                            </optgroup>
                                            <optgroup label="North America" data-catid="North-America">
                                                <option class="catNorth-America" data-catid="North-America" data-content="Antigua and Barbuda" title="Antigua and Barbuda" value="4">
                                                    Antigua and Barbuda                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Bahamas" title="Bahamas" value="30">
                                                    Bahamas                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Barbados" title="Barbados" value="18">
                                                    Barbados                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Bermuda" title="Bermuda" value="26">
                                                    Bermuda                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Canada" title="Canada" value="36">
                                                    Canada                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Cuba" title="Cuba" value="50">
                                                    Cuba                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Dominica" title="Dominica" value="58">
                                                    Dominica                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Dominican Republic" title="Dominican Republic" value="59">
                                                    Dominican Republic                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Greenland" title="Greenland" value="81">
                                                    Greenland                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Grenada" title="Grenada" value="76">
                                                    Grenada                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Haiti" title="Haiti" value="96">
                                                    Haiti                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Jamaica" title="Jamaica" value="107">
                                                    Jamaica                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Mexico" title="Mexico" value="150">
                                                    Mexico                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Saint Kitts and Nevis" title="Saint Kitts and Nevis" value="115">
                                                    Saint Kitts and Nevis                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Saint Lucia" title="Saint Lucia" value="123">
                                                    Saint Lucia                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Saint Pierre and Miquelon" title="Saint Pierre and Miquelon" value="173">
                                                    Saint Pierre and Miquelon                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="Trinidad and Tobago" title="Trinidad and Tobago" value="216">
                                                    Trinidad and Tobago                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="United States" title="United States" value="223">
                                                    United States                        </option>
                                                <option class="catNorth-America" data-catid="North-America" data-content="United States Minor Outlying Islands" title="United States Minor Outlying Islands" value="222">
                                                    United States Minor Outlying Islands                        </option>
                                            </optgroup>
                                            <optgroup label="South America" data-catid="South-America">
                                                <option class="catSouth-America" data-catid="South-America" data-content="Anguilla" title="Anguilla" value="5">
                                                    Anguilla                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Argentina" title="Argentina" value="11">
                                                    Argentina                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Aruba" title="Aruba" value="15">
                                                    Aruba                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Bolivia" title="Bolivia" value="28">
                                                    Bolivia                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Brazil" title="Brazil" value="29">
                                                    Brazil                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Cayman Islands" title="Cayman Islands" value="119">
                                                    Cayman Islands                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Chile" title="Chile" value="44">
                                                    Chile                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Colombia" title="Colombia" value="47">
                                                    Colombia                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Ecuador" title="Ecuador" value="61">
                                                    Ecuador                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Guadeloupe" title="Guadeloupe" value="84">
                                                    Guadeloupe                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Guyana" title="Guyana" value="91">
                                                    Guyana                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Martinique" title="Martinique" value="143">
                                                    Martinique                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Montserrat" title="Montserrat" value="145">
                                                    Montserrat                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Paraguay" title="Paraguay" value="179">
                                                    Paraguay                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Peru" title="Peru" value="167">
                                                    Peru                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Puerto Rico" title="Puerto Rico" value="175">
                                                    Puerto Rico                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Saint Vincent and the Grenadines" title="Saint Vincent and the Grenadines" value="227">
                                                    Saint Vincent and the Grenadines                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Suriname" title="Suriname" value="199">
                                                    Suriname                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Turks and Caicos Islands" title="Turks and Caicos Islands" value="204">
                                                    Turks and Caicos Islands                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Uruguay" title="Uruguay" value="224">
                                                    Uruguay                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Venezuela" title="Venezuela" value="228">
                                                    Venezuela                        </option>
                                                <option class="catSouth-America" data-catid="South-America" data-content="Virgin Islands, British" title="Virgin Islands, British" value="229">
                                                    Virgin Islands, British                        </option>
                                            </optgroup>
                                    </select>


                                </div>



                                <div class="form-group col-md-4">

                                    <label>Language</label>

                                    <select class="form-control" id="select-state" name="language" >
                                        <option value="" selected>All</option>
                                        <option value="5">English</option>
                                        <option value="1">Arabic</option>
                                        <option value="2">Bulgarian</option>
                                        <option value="3">Chinese</option>
                                        <option value="4">Dutch</option>
                                        <option value="6">French</option>
                                        <option value="7">German</option>
                                        <option value="8">Greek</option>
                                        <option value="9">Hindi</option>
                                        <option value="10">Hrvatski</option>
                                        <option value="11">Indonesian</option>
                                        <option value="12">Italian</option>
                                        <option value="13">Japanese</option>
                                        <option value="14">Korean</option>
                                        <option value="15">Norwegian</option>
                                        <option value="16">Other</option>
                                        <option value="17">Polish</option>
                                        <option value="18">Portuguese</option>
                                        <option value="19">Romanian</option>
                                        <option value="20">Russian</option>
                                        <option value="21">Spanish</option>
                                        <option value="22">Swedish</option>
                                        <option value="23">Turkish</option>
                                        <option value="24">Ukrainian</option>
                                    </select>

                                </div>





                                <div class="form-group col-md-4">

                                    <label> Categories </label>

                                    <select class="form-control" id="select-state" name="category" >
                                        <option value="" selected>All</option>

                                        <option value="1">Agriculture</option>
                                        <option value="2">Animals and Pets</option>
                                        <option value="3">Art</option>
                                        <option value="4">Automobiles</option>
                                        <option value="5">Business</option>
                                        <option value="6">Books</option>
                                        <option value="7">Beauty</option>
                                        <option value="8">Career and Employment</option>
                                        <option value="9">Computers</option>
                                        <option value="10">Construction and Repairs</option>
                                        <option value="11">Culture</option>
                                        <option value="12">E-commerce</option>
                                        <option value="13">Education</option>
                                        <option value="14">Entertainment</option>
                                        <option value="15">Environment</option>
                                        <option value="16">Equipment</option>
                                        <option value="17">Fashion</option>
                                        <option value="18">Finance</option>
                                        <option value="19">Food</option>
                                        <option value="20">For Сhildren</option>
                                        <option value="21">For Men</option>
                                        <option value="22">For Women</option>
                                        <option value="23">Gadgets</option>
                                        <option value="24">Games</option>
                                        <option value="25">Hardware development</option>
                                        <option value="26">Health</option>
                                        <option value="28">Home and Family</option>
                                        <option value="29">Humor</option>
                                        <option value="30">Internet</option>
                                        <option value="31">Law</option>
                                        <option value="32">Leisure and Hobbies</option>
                                        <option value="33">Lifestyle</option>
                                        <option value="34">Literature</option>
                                        <option value="35">Manufacturing</option>
                                        <option value="36">Marketing and Advertising</option>
                                        <option value="37">Miscellaneous</option>
                                        <option value="38">Mobile</option>
                                        <option value="39">Movies</option>
                                        <option value="40">Music</option>
                                        <option value="41">Nature</option>
                                        <option value="42">News and Media</option>
                                        <option value="43">Personal Blogs</option>
                                        <option value="44">Photography</option>
                                        <option value="45">Places</option>
                                        <option value="46">Politics</option>
                                        <option value="47">Programming</option>
                                        <option value="48">Public Service</option>
                                        <option value="49">Real Estate</option>
                                        <option value="50">Science</option>
                                        <option value="51">Shopping</option>
                                        <option value="52">Society</option>
                                        <option value="53">Software development</option>
                                        <option value="54">Sports</option>
                                        <option value="55">Startups</option>
                                        <option value="27">Technology</option>
                                        <option value="56">Travelling</option>
                                        <option value="57">Transport</option>
                                        <option value="58">Web-development</option>
                                    </select>

                                </div>

                                <div class="form-group col-md-4">

                                    <label> Marked “Sponsored by” </label>

                                    <select class="form-control" id="select-state" name="marked_sponsored" >
                                        <option value="" selected>All</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>

                                </div>




                                <div class="form-group col-md-4">

                                    <label> Service type </label>

                                    <select class="form-control" id="select-state" name="service_type" >
                                            <option value="" selected>All</option>
                                            <option value="1">Content placement</option>
                                            <optgroup label="Content creation and placement">
                                                <option value="3">Mini-post</option>
                                                <option value="4">Article</option>
                                                <option value="5">Long article</option>
                                            </optgroup>
                                    </select>

                                </div>


                                <div class="form-group col-md-4">

                                    <label> Show </label>

                                    <select class="form-control" id="select-state" name="show" >
                                        <option value="0" selected>All websites</option>
                                        <option value="1">Only sites I've worked with</option>
                                        <option value="2">Exclude sites I've already worked with</option>
                                        <option value="3">Exclude sites without specified prices</option>
                                    </select>

                                </div>

                                <button type="submit" class="btn btn-primary" style="margin-right: 40%;">محاصبه تعداد و زمان</button>




                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </form>
@endsection
