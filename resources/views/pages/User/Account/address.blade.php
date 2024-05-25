@extends('layouts.AccountLayout')
@section('content')
<section class="bread-crumb d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-12 a-left">
                <ul class="breadcrumb">
                    <li class="home d-none">
                        <a href="/"><span>Trang chủ</span></a>
                        <span class="mr_lr">&nbsp;/&nbsp;</span>
                    </li>
                    <li>
                        <a href="/account"><span>Tài khoản</span></a>
                    </li>
                    <li class="last">
                        <strong><span>Tài khoản</span></strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="address page_address">
    <div class="container">
        <div class="row">
            <div class="col-left-ac">
                <div class="block-account">
                    <div class="info info-1">
                        <img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/account_ava.jpg?1713495880758" alt="Thiện">
                        <p>Thiện</p>
                        <a class="click_logout" href="/account/logout">Đăng xuất</a>
                    </div>
                    <ul>
                        <li>
                            <a class="title-info" href="{{route('account')}}">Tài khoản của tôi</a>
                        </li>
                        <li>
                            <a disabled="disabled" class="title-info " href="{{route('account.order')}}">Đơn hàng của tôi</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.change-password')}}">Đổi mật khẩu</a>
                        </li>
                        <li>
                            <a class="title-info active" href="{{route('account.address')}}">Sổ địa chỉ</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.order')}}">Đã xem gần đây</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.wishlist')}}">Sản phẩm yêu thích</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-right-ac">
                <h1 class="title-head">Địa chỉ của bạn<button class="btn-edit-addr btn btn-primarys btn-more" type="button" onclick="Bizweb.CustomerAddress.toggleNewForm(); return false;">+ Thêm địa chỉ mới</button></h1>
                <div id="add_address" class="form-list modal_address modal" style="height: 480px;">
                    <div class="btn-close closed_pop"><i class="fa fa-times"></i></div>
                    <h2 class="title_pop">Thêm địa chỉ mới</h2>
                    <form method="post" action="/account/addresses" id="customer_address" accept-charset="UTF-8"><input name="FormType" type="hidden" value="customer_address"><input name="utf8" type="hidden" value="true">
                        <div class="pop_bottom">
                            <div class="form_address">
                                <div class="row">
                                    <div class="field col-md-6">
                                        <fieldset class="form-group">
                                            <input type="text" name="FullName" class="form-control" data-validation-error-msg="Không được để trống" data-validation="required" value="" autocapitalize="words">
                                            <label>Họ tên</label>
                                        </fieldset>
                                        <p class="error-msg"></p>
                                    </div>
                                    <div class="field col-md-6">
                                        <fieldset class="form-group">
                                            <input type="number" class="form-control" id="Phone" pattern="\d+" name="Phone" maxlength="12" value="">
                                            <label>Số điện thoại</label>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="field">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" name="Company" value="">
                                        <label>Công ty</label>
                                    </fieldset>
                                </div>
                                <div class="field">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" name="Address1" value="">
                                        <label>Địa chỉ</label>
                                    </fieldset>
                                </div>
                                <div class="field">
                                    <fieldset class="form-group select-field vndf">
                                        <select name="Country" class="form-control vn-fix add has-content" id="mySelect1" data-default="Việt Nam">
                                            <option value="Abkhazia">Abkhazia</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo-Brazzaville">Congo-Brazzaville</option>
                                            <option value="Congo-Kinshasa">Congo-Kinshasa</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan (Nippon)">Japan (Nippon)</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="North Korea">North Korea</option>
                                            <option value="Kosovo">Kosovo</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macedonia (FYROM)">Macedonia (FYROM)</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Nagorno-Karabakh">Nagorno-Karabakh</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines
                                            </option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="South Sudan">South Sudan</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Ossetia">South Ossetia</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="China">China</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Vatican">Vatican</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Wales">Wales</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                            <option value="Taiwan">Taiwan</option>
                                        </select>
                                        <label>Quốc gia</label>
                                    </fieldset>
                                </div>
                                <div class="group-country">
                                    <fieldset class="form-group select-field not-vn">
                                        <select name="Province" value="" class="form-control add has-content" id="mySelect2" data-address-type="province" data-address-zone="billing" data-select2-id="select2-data-billingProvince"></select>
                                        <label>Tỉnh thành</label>
                                    </fieldset>
                                    <fieldset class="form-group select-field not-vn">
                                        <select name="District" class="form-control add has-content" value="" id="mySelect3" data-address-type="district" data-address-zone="billing" data-select2-id="select2-data-billingDistrict"></select>
                                        <label>Quận huyện</label>
                                    </fieldset>
                                    <fieldset class="form-group select-field not-vn">
                                        <select name="Ward" class="form-control add has-content" value="" id="mySelect4" data-address-type="ward" data-address-zone="billing" data-select2-id="select2-data-billingWard"></select>
                                        <label>Phường xã</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="checkbox">
                                <label class="c-input c-checkbox" style="padding-left: 26px;">
                                    <input type="checkbox" id="address_default_address_" name="IsDefault" value="true">
                                    <span class="c-indicator">Đặt là địa chỉ mặc định?</span>
                                </label>
                            </div>
                            <div class="btn-row">
                                <button class="btn btn-lg btn-dark-address btn-outline article-readmore btn-close" type="button" onclick="Bizweb.CustomerAddress.toggleNewForm(); return false;">HỦY</button>
                                <button class="btn btn-lg btn-primarys btn-submit" id="addnew" type="submit">LƯU</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="total_address">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection