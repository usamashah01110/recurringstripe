
<link rel="stylesheet" href="{{ asset('assets/dd/assets/build') }}/css/countrySelect.css">
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/dd/assets') }}/js/config.js.download"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
     <script async="" defer="" src="{{ asset('assets/dd/assets') }}/js/buttons.js.download"></script>
    <script type="text/javascript" src="{{ asset('assets/dd/assets') }}/js/api.min.js.download" async="" data-user="252882" data-account="269977"></script>
    <link rel="stylesheet" href="{{ asset('assets/dd/assets') }}/css/api.min.css" id="omapi-css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/dd/assets') }}/css/css2(1)">

    <x-dd_inner_layout bodyClass="gray-bg" >

        <div class="animated fadeInDown">

            <div class="text-center">
                <input type="hidden" id="hdnCampaignId">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 mb-4 mb-md-2">
                        <h3>Campaign Detail</h3>
                      <div class="accordion mt-3" id="accordionExample">
                        <div class="accordion-item" style="visibility: hidden; display: none;">
                          <h2 class="accordion-header" id="headingOne">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-controls="accordionOne">
                              Personal Information
                            </button>
                          </h2>

                          <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body" style="visibility: visible !important;">
                                <div class="row">
                                    <div class="col-lg-12">
                                      <div class="row row-gutter-20">
                                        <form id="frmPersonalInfo">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <label  id="name"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Sur Name</label>
                                                    <label  id="surname"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <label  id="emailaddress"></label>
                                                </div>
                                            </div>
                                            <h5>Date of Birth</h5>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label  id="dob"></label>

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <label  id="contact_number"></label>

                                                </div>
                                            </div>
                                            <h5>Please include your international dailing code and the minimum length is 7 characters</h5>
                                            <h5>Your Home Address</h5>
                                            <div class="col-md-12">
                                                <div class="form-group" style="text-align: left;">
                                                    <label>Country</label>
                                                    <label  id="country"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <label  id="address"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Town</label>
                                                    <label  id="town"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <label  id="city"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <label  id="postal_code"></label>
                                                </div>
                                            </div>
                                            <h5>Your Government issue id</h5>
                                            <div class="col-md-12">
                                                <label>Picture</label>
                                                <img  id="image_name"></img>
                                            </div>

                                        </form>
                                      </div>
                                    </div>
                                </div>

                            </div>
                          </div>
                        </div>
                        <div class="accordion-item" style="visibility: hidden; display: none;">
                          <h2 class="accordion-header" id="headingTwo">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                              Bank Information
                            </button>
                          </h2>
                          <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body"  style="visibility: visible !important;">
                                <div class="row">
                                    <div class="col-lg-12">
                                      <div class="row row-gutter-20">
                                        <form id="frmBankInfo">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select data-placeholder="Choose a Curreny" class="form-control chosen-select" id="currencysymbol" tabindex="3">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="bankaccname" id="bankaccname" placeholder="Name of Bank Account" tabIndex="2">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="bankcountry" id="bankcountry" placeholder="Bank Country" tabIndex="3">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="bankname" id="bankname" placeholder="Bank Name" tabIndex="3">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select data-placeholder="Choose a Bank Account Class" class="form-control chosen-select" id="bankaccclass" tabindex="5">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select data-placeholder="Choose a Bank Account Type" class="form-control chosen-select" id="bankaccounttype" tabindex="6">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="sortcode" id="sortcode" placeholder="Sort Code" tabIndex="7">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="account_number" id="account_number" placeholder="Account Number" tabIndex="9">
                                                </div>
                                            </div>

                                            <h5>Bank Verification Document</h5>
                                            <div class="col-md-12">
                                                <input class="form-control" type="file" name="bank_doc_image_name" id="bank_doc_image_name" placeholder="Image File" tabIndex="13">
                                            </div>

                                        </form>
                                      </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 20px !important;">
                                    <div class="col-lg-12">
                                      <div class="row row-gutter-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-funding" value="Cancel" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input  type="button" class="btn btn-donate" value="Save" onclick="saveBankInfo()" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                              Campaign
                            </button>
                          </h2>
                          <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body"  style="visibility: visible !important;">
                                <div class="row">
                                    <div class="col-lg-12">
                                      <div class="row row-gutter-20">
                                        <form id="frmcampaign">
                                            <h2 style="padding-left: 15px !important;">Name</h2>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="campname"></label>
                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Fundraising Target</h2>
                                            <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label id="targetamount"></label>
                                                    </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Main Picture</h2>
                                            <h5 style="padding-left: 15px !important;">This is the primary picture of your fundriser, so ensure it's emotionally engaging! you can update this image if neede.</h5>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="image-crop" style="height: 110px !important; width: 130px !important;">
                                                        <img height="110px" width="130px" id="campaignimage">
                                                    </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Headline</h2>
                                            <h5 style="padding-left: 15px !important;">This is the primary picture of your fundriser, so ensure it's emotionally engaging! you can update this image if neede.</h5>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="headline"></label>
                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Category</h2>
                                            <h5 style="padding-left: 15px !important;">This is the primary picture of your fundriser, so ensure it's emotionally engaging! you can update this image if neede.</h5>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="category"></label>

                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Location</h2>
                                            <h5 style="padding-left: 15px !important;">This is the primary picture of your fundriser, so ensure it's emotionally engaging! you can update this image if neede.</h5>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="location"></label>

                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Campaign last day</h2>
                                            <h5 style="padding-left: 15px !important;">This is the primary picture of your fundriser, so ensure it's emotionally engaging! you can update this image if neede.</h5>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="campaignlastdate"></label>

                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Your Story</h2>
                                            <h5 style="padding-left: 15px !important;">This is the primary picture of your fundriser, so ensure it's emotionally engaging! you can update this image if neede.</h5>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="yourstory"></label>

                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Evidence</h2>
                                            <h5 style="padding-left: 15px !important;">This is the primary picture of your fundriser, so ensure it's emotionally engaging! you can update this image if neede.</h5>
                                            <h2 style="padding-left: 15px !important;">Facebook Link</h2>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="facebook_evidence"></label>

                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Twitter Link</h2>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="twitter_evidence"></label>

                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Youtube Link</h2>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="youtube_evidence"></label>

                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Instagram Link</h2>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="instagram_evidence"></label>

                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">News Link</h2>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="news_evidence"></label>

                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Evidence Picture</h2>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="image-crop" style="height: 110px !important; width: 130px !important;">
                                                        <img height="110px" width="130px" id="file_evidence">
                                                    </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Evidence Video</h2>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="image-crop" style="height: 110px !important; width: 130px !important;">
                                                        {{-- <img height="110px" width="130px" id="video_evidence"> --}}
                                                        <video id="video_evidence" class="video-js" style="height:110px !important;width:130px !important;" controls>
                                                           <source  type="video/mp4">
                                                        </video>
                                                    </div>

                                                </div>
                                            </div>
                                            <h2 style="padding-left: 15px !important;">Description</h2>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="evidence_desc"></label>

                                                </div>
                                            </div>

                                        </form>
                                      </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 20px !important;">
                                    <div class="col-lg-12">
                                      <div class="row row-gutter-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-funding" value="Cancel" onclick="CancelDonation()" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input  type="button" class="btn btn-donate" value="Donate Now" onclick="ShowDonation()" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="fundraiser" style="padding-top: 20px !important; visibility:hidden;display:none;">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="fundraisername" id="fundraisername" placeholder="Fundraiser Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="fundraiseremail" id="fundraiseremail" placeholder="Fundraiser Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <input class="form-control" id="country_selector" type="text" tabindex="8">
                                                <label for="country_selector" style="display:none;">Select a country here...</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="fundraisercontact_number" id="fundraisercontact_number" placeholder="Fundraiser Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group" >
                                                    <span class="input-group-addon" id="currencysym"></span>
                                                    <input type="number" class="form-control" name="donation_amount" id="donation_amount" placeholder="Enter Amount to Donate" onblur="calculateTip()" onkeypress="return allowOnlyNumbers(event)" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group" >

                                                    <input type="nuumber" class="form-control"  name="tipsinpercentage" id="tipsinpercentage" placeholder="Enter Tips in Percentage" value="16" min="0" max="100" onblur="calculateTip()" maxlength="3" onkeypress="return allowOnlyNumbers(event)"/>
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="tipsgiven" id="tipsgiven" placeholder="Tips Given" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="currency" id="currency" value="usd">

                                     <div class="col-lg-12">
                                        <label for="card-element" class="form-label">Card Details</label>
                                        <div class="card border-light p-3" id="card-element">
                                            <!-- Stripe Elements will be inserted here -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row row-gutter-20">
                                                  <div class="form-group">
                                                      <!-- <input  type="button" id="one-time-pay-button" class="btn btn-donate" value="Submit" onclick="SaveDonation()" /> -->
                                                      <input  type="button" id="one-time-pay-button" class="btn btn-donate" value="Submit" />
                                              </div>
                                          </div>
                                      </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </br>

                      </div>
                    </div>
                </div>
            </br>
            </div>
        </div>




      </x-dd_inner_layout>

      {{-- <script src="{{ asset('assets/dd/assets') }}/js/jquery.js.download"></script>
       --}}
      <script src="{{ asset('assets/dd/assets') }}/js/popper.js.download"></script>
      <script src="{{ asset('assets/dd/assets') }}/js/bootstrap.js.download"></script>

      <script src="{{ asset('assets/dd/assets') }}/js/node-waves.js.download"></script>
      <script src="{{ asset('assets/dd/assets') }}/js/perfect-scrollbar.js.download"></script>

      <script src="{{ asset('assets/dd/assets') }}/js/menu.js.download"></script>
      <!-- END: Page Vendor JS-->
      <!-- BEGIN: Theme JS-->
      {{-- <script src="{{ asset('assets/dd/assets') }}/js/main.js.download"></script>
       --}}
      <script src="{{ asset('assets/dd/assets/build') }}/js/countrySelect.js"></script>

      <script>

    // Script for Stripe Payment

     const oneTimeDonationUrl = "http://127.0.0.1:8000/api/donation/one-time";
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.getElementById('one-time-pay-button').addEventListener('click', async function() {
        const { paymentMethod, error } = await stripe.createPaymentMethod({
            type: 'card',
            card: cardElement,
        });

        if (error) {
            alert(error.message);
        } else {
            const formData = new FormData(document.getElementById('fundraiser-form'));
            formData.append('payment_method', paymentMethod.id);

            fetch(oneTimeDonationUrl, {
                method: 'POST',
                headers: {'X-CSRF-TOKEN': csrfToken},
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        console.error('HTTP error:', response.status);
                        return response.json().then(errorData => {
                            console.error('Error details:', errorData);
                            throw new Error('Request failed');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    alert(data.message || data.error);
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });
        }
    });

    // Script end for stripe payment

      $(document).ready(function() {
        $("#country_selector").countrySelect({
                    // defaultCountry: "jp",
                    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                    // responsiveDropdown: true,
                    preferredCountries: ['pk','gb','us']
                });
                $("#home_country_selector").countrySelect({
                    // defaultCountry: "jp",
                    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                    // responsiveDropdown: true,
                     preferredCountries: ['pk','gb','us']
                });
                $("#deestination_country_selector").countrySelect({
                    // defaultCountry: "jp",
                    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                    // responsiveDropdown: true,
                    preferredCountries: ['pk','gb','us']
                });
        var config = {
                    '.chosen-select'           : {},
                    '.chosen-select-deselect'  : {allow_single_deselect:true},
                    '.chosen-select-no-single' : {disable_search_threshold:10},
                    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                    '.chosen-select-width'     : {width:"95%"}
                    }
                for (var selector in config) {
                    $(selector).chosen(config[selector]);
                }
                //const url = "http://localhost:9001/donations?camp_id=6&created_by=4";///window.location.href;
                const queryString = window.location.search;
                ///alert(queryString);
                const queryParams = queryString.substring(1);

                // Split the query string into individual key-value pairs
                const pairs = queryParams.split("&");

                // Create an object to store the parameters
                const params = {};

                // Loop through each key-value pair and add them to the object
                pairs.forEach(pair => {
                const [key, value] = pair.split("=");
                params[key] = decodeURIComponent(value);
                });
                const createBy = params.created_by;
                const campId = params.id;
                $("#hdnCampaignId").val(campId);
                loadPersonalInfo(createBy);
                loadCampaign(campId);

      });
      function allowOnlyNumbers(event) {
        // Get the input character code
        const charCode = event.which ? event.which : event.keyCode;

        // Allow only numbers (0-9) and backspace (8)
        if ((charCode >= 48 && charCode <= 57) || charCode === 8) {
            return true;
        } else {
            return false;
        }
     }
    function calculateTip()
    {
    ///alert("hello");}
        const donationAmount = $("#donation_amount").val();
        const tip = $("#tipsinpercentage").val();
        const tipsgiven = calculate_Percentage(parseInt(donationAmount), parseInt(tip));
        $("#tipsgiven").val(tipsgiven);
      }
      function calculate_Percentage(donationAmount, tip) {
            // Function to calculate percentage, handling edge cases and providing clear output

            if (typeof donationAmount !== 'number' || typeof tip !== 'number') {
                throw new TypeError('Both Donation Amount and tip must be numbers.');
            }

            if (donationAmount <= 0) {
                throw new RangeError('Donation Amount cannot be zero or negative.');
            }

            const percentage = (donationAmount * tip) / 100;
            return percentage.toFixed(0); // Format to two decimal places (optional)
        }


      function loadPersonalInfo(id)
      {
        const data = {
            "records_per_page": 10,
            "page": 1,
            "name": "",
            "id": id
            };
            const token = localStorage.getItem('access_token'); // Replace with your token storage method

            const queryParams = new URLSearchParams(data);

            // Append query parameters to the URL
            const urlWithParams = `${load_personal_information}?${queryParams}`;
            ////alert(urlWithParams);
            fetch(urlWithParams, {
                method: 'GET',
                headers: {
                'Content-Type': 'application/json', // Important for JSON data
                'Authorization': `Bearer ${token}` // Include the token in the Authorization header
                // Add CSRF token if required (see Laravel documentation)
                },
               /// body: JSON.stringify(data),
            })
            .then(response => response.json()) // Parse the JSON response
            .then(data => {
                ///alert(JSON.stringify(data.data));
                if (data.success) {
                    const personalInfo = data.data;//JSON.stringify(data.data);
                    ///console.log(personalInfo);
                    //alert(personalInfo[0]['name']);
                    const name  = personalInfo[0]['name'];
                    const labelname = document.getElementById('name');
                    // Set the text content of the label
                    labelname.textContent = name;
                    const surname = personalInfo[0]['surname'];
                    const labelsurname = document.getElementById('surname');
                    // Set the text content of the label
                    labelsurname.textContent = surname;
                    const emailaddress = personalInfo[0]['email'];
                    const labelemailaddress = document.getElementById('emailaddress');
                    // Set the text content of the label
                    labelemailaddress.textContent = emailaddress;
                    const dob = personalInfo[0]['dobday'] + "/" + personalInfo[0]['dobmonth'] + "/" + personalInfo[0]['dobyear'];
                    const labeldob = document.getElementById('dob');
                    // Set the text content of the label
                    labeldob.textContent = dob;
                    const contact_number = personalInfo[0]['contact_number'];
                    const labelcontact_number = document.getElementById('contact_number');
                    // Set the text content of the label
                    labelcontact_number.textContent = contact_number;
                    const country = personalInfo[0]['country'];
                    const labelcountry = document.getElementById('country');
                    // Set the text content of the label
                    labelcountry.textContent = country;
                    const address = personalInfo[0]['address'];
                    const labeladdress = document.getElementById('address');
                    // Set the text content of the label
                    labeladdress.textContent = address;
                    const town = personalInfo[0]['town'];
                    const labeltown = document.getElementById('town');
                    // Set the text content of the label
                    labeltown.textContent = town;
                    const city = personalInfo[0]['city'];
                    const labelcity = document.getElementById('city');
                    // Set the text content of the label
                    labelcity.textContent = city;
                    const postal_code = personalInfo[0]['postal_code'];
                    const labelpostal_code = document.getElementById('postal_code');
                    // Set the text content of the label
                    labelpostal_code.textContent = postal_code;
                    const image_name = personalInfo[0]['image_name'];
                    const image_name_control = document.getElementById('image_name');
                    // Set the text content of the label
                    image_name_control.src = campaign_image_path + image_name;
                } else {
                    console.error('Invalid data:', data.error);
                // Show an error message to the user
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Handle network errors or unexpected issues
            });
      }
      function loadCampaign(id)
      {
        const data = {
            "records_per_page": 10,
            "page": 1,
            "title": "",
            "id": id
            };
            const token = localStorage.getItem('access_token'); // Replace with your token storage method

            const queryParams = new URLSearchParams(data);

            // Append query parameters to the URL
            const urlWithParams = `${load_campaign}?${queryParams}`;
            ////alert(urlWithParams);
            fetch(urlWithParams, {
                method: 'GET',
                headers: {
                'Content-Type': 'application/json', // Important for JSON data
                'Authorization': `Bearer ${token}` // Include the token in the Authorization header
                // Add CSRF token if required (see Laravel documentation)
                },
               /// body: JSON.stringify(data),
            })
            .then(response => response.json()) // Parse the JSON response
            .then(data => {
                ///alert(JSON.stringify(data.data));
                if (data.success) {
                    const campaignInfo = data.data;//JSON.stringify(data.data);
                    console.log(campaignInfo);

                    const category_name = campaignInfo[0]["category_name"];
                    document.getElementById("category").textContent = category_name;
                    const fundraisingtarget = campaignInfo[0]["currencysymbol"] + " " + campaignInfo[0]["fundraisingtarget"];
                    document.getElementById("targetamount").textContent = fundraisingtarget;
                    document.getElementById("currencysym").textContent = campaignInfo[0]["currencysymbol"];
                    const evidence_desc = campaignInfo[0]["evidence_desc"];
                    document.getElementById("evidence_desc").textContent = evidence_desc;
                    const facebook_evidence = campaignInfo[0]["facebook_evidence"];
                    document.getElementById("facebook_evidence").textContent = facebook_evidence;
                    const file_evidence = campaign_image_path + campaignInfo[0]["file_evidence"];
                    const fileEvidenceImage = document.getElementById("file_evidence");
                    fileEvidenceImage.src = file_evidence;
                    fileEvidenceImage.onclick = function() {
                        // Create a new window to display the image
                        const newWindow = window.open('', 'ImageWindow', 'width=800,height=600');

                        // Create an image element in the new window
                        const newImage = document.createElement('img');
                        newImage.src = fileEvidenceImage.src;

                        // Append the new image to the new window's body
                        newWindow.document.body.appendChild(newImage);
                    };
                    const headline = campaignInfo[0]["headline"];
                    document.getElementById("headline").textContent = headline;
                    const instagram_evidence = campaignInfo[0]["instagram_evidence"];
                    document.getElementById("instagram_evidence").textContent = instagram_evidence;
                    const location = campaignInfo[0]["location"];
                    document.getElementById("location").textContent = location;
                    const name = campaignInfo[0]["name"];
                    document.getElementById("campname").textContent = name;
                    const picture = campaign_image_path + campaignInfo[0]["picture"];
                    const myImage = document.getElementById("campaignimage");
                    myImage.src = picture;
                    myImage.onclick = function() {
                        // Create a new window to display the image
                        const newWindow = window.open('', 'ImageWindow', 'width=800,height=600');

                        // Create an image element in the new window
                        const newImage = document.createElement('img');
                        newImage.src = myImage.src;

                        // Append the new image to the new window's body
                        newWindow.document.body.appendChild(newImage);
                    };
                    const twitter_evidence = campaignInfo[0]["twitter_evidence"];
                    document.getElementById("twitter_evidence").textContent = twitter_evidence;
                    var videoElement = document.getElementById('video_evidence');
                    const video_evidence = campaign_image_path + campaignInfo[0]["video_evidence"];
                    videoElement.src = video_evidence;
                    const yourstory = campaignInfo[0]["yourstory"];
                    document.getElementById("yourstory").textContent = yourstory;
                    const youtube_evidence = campaignInfo[0]["youtube_evidence"];
                    document.getElementById("youtube_evidence").textContent = youtube_evidence;
                    const news_evidence = campaignInfo[0]["news_link"];
                    document.getElementById("news_evidence").textContent = news_evidence;
                    const lastdatetime = campaignInfo[0]["lastdatetime"];
                    document.getElementById("campaignlastdate").textContent = lastdatetime;
                    // campname,targetamount,campaignimage,headline,category,location,campaignlastdate,yourstory,facebook_evidence,
                    //                                 twitter_evidence,youtube_evidence,instagram_evidence,file_evidence,video_evidence,
                    //                                 evidence_desc

                    // alert(personalInfo[0]['name']);
                    // const name  = personalInfo[0]['name'];
                    // const labelname = document.getElementById('name');
                    // // Set the text content of the label
                    // labelname.textContent = name;
                    // const surname = personalInfo[0]['surname'];
                    // const labelsurname = document.getElementById('surname');
                    // // Set the text content of the label
                    // labelsurname.textContent = surname;
                    // const emailaddress = personalInfo[0]['email'];
                    // const labelemailaddress = document.getElementById('emailaddress');
                    // // Set the text content of the label
                    // labelemailaddress.textContent = emailaddress;
                    // const dob = personalInfo[0]['dobday'] + "/" + personalInfo[0]['dobmonth'] + "/" + personalInfo[0]['dobyear'];
                    // const labeldob = document.getElementById('dob');
                    // // Set the text content of the label
                    // labeldob.textContent = dob;
                    // const contact_number = personalInfo[0]['contact_number'];
                    // const labelcontact_number = document.getElementById('contact_number');
                    // // Set the text content of the label
                    // labelcontact_number.textContent = contact_number;
                    // const country = personalInfo[0]['country'];
                    // const labelcountry = document.getElementById('country');
                    // // Set the text content of the label
                    // labelcountry.textContent = country;
                    // const address = personalInfo[0]['address'];
                    // const labeladdress = document.getElementById('address');
                    // // Set the text content of the label
                    // labeladdress.textContent = address;
                    // const town = personalInfo[0]['town'];
                    // const labeltown = document.getElementById('town');
                    // // Set the text content of the label
                    // labeltown.textContent = town;
                    // const city = personalInfo[0]['city'];
                    // const labelcity = document.getElementById('city');
                    // // Set the text content of the label
                    // labelcity.textContent = city;
                    // const postal_code = personalInfo[0]['postal_code'];
                    // const labelpostal_code = document.getElementById('postal_code');
                    // // Set the text content of the label
                    // labelpostal_code.textContent = postal_code;
                    // const image_name = personalInfo[0]['image_name'];
                    // const image_name_control = document.getElementById('image_name');
                    // // Set the text content of the label
                    // image_name_control.src = campaign_image_path + image_name;
                } else {
                    console.error('Invalid data:', data.error);
                // Show an error message to the user
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Handle network errors or unexpected issues
            });
      }
      function ShowDonation()
      {
        const fundraiser = document.getElementById('fundraiser');
        fundraiser.style.display = 'block';
        fundraiser.style.visibility = 'visible';
    }
    function CancelDonation()
    {
        const fundraiser = document.getElementById('fundraiser');
        fundraiser.style.display = 'none';
        fundraiser.style.visibility = 'hidden';
    }
    function SaveDonation()
    {
        const fundraisername = $("#fundraisername").val();
        const fundraiseremail = $("#fundraiseremail").val();
        const fundraisercontact_number = $("#fundraisercontact_number").val();
        const donation_amount = $("#donation_amount").val();
        const campaign_id = $("#hdnCampaignId").val();
        const country_selector = $("#country_selector").val();
        const tipsinpercentage = $("#tipsinpercentage").val();
        const tipsgiven = parseInt($("#tipsgiven").val());
        if(fundraisername == "")
        {
            warning_error_message("Please Enter Fundraiser Name","error","Error");
            return;
        }
        if(fundraiseremail == "")
        {
            warning_error_message("Please Enter Fundraiser Email","error","Error");
            return;
        }
        if(fundraisercontact_number == "")
        {
            warning_error_message("Please Enter Fundraiser Contact Number","error","Error");
            return;
        }
        if(donation_amount == "")
        {
            warning_error_message("Please Enter Donation Amount","error","Error");
            return;
        }
        if(country_selector == "")
        {
            warning_error_message("Please Select Country","error","Error");
            return;
        }
        if(tipsinpercentage == "")
        {
            warning_error_message("Please Enter Tips Percentage","error","Error");
            return;
        }
        if(tipsgiven == "")
        {
            warning_error_message("Tips Given is missing","error","Error");
            return;
        }
        const data = {
            "name": fundraisername,
            "email": fundraiseremail,
            "contact_number": fundraisercontact_number,
            "campaign_id": campaign_id,
            "donation_amount": donation_amount,
            "donor_country": country_selector,
            "tips_in_percentage": tipsinpercentage,
            "tips_given": tipsgiven
            };
            if(getFundraisingAmt(campaign_id))
            {
                message("Fundraising Target are met. No more fund required.");
                return;
            }
            else
            {
            console.log(data);
            fetch(save_donation, {
                method: "POST", // Set the HTTP method to POST
                headers: {
                    "Content-Type": "application/json" // Set the content type header
                },
                body: JSON.stringify(data) // Send the data object as the request body
                })
                .then(response => response.json()) // Parse the JSON response
            .then(data => {

            console.log(data);
            if (data.success) {
                message(data.message.success);
             // Redirect to a protected page or show success message
            } else {
                //alert('error');
            // Handle login failure: display error message
            warning_error_message(`API request failed with status ${data.error.error}`,"error","Error!");
            // Show an error message to the user
            }

        })
        .catch(error => {
            warning_error_message(`API request failed with status ${error}`,"error","Error!");
            // Handle network errors or unexpected issues
        });
    }

    }
    function getFundraisingAmt(campaign_id)
    {
            const token = localStorage.getItem('access_token'); // Replace with your token storage method


            // Append query parameters to the URL
            const urlWithParams = get_campaign_by_id + '/' + campaign_id;
            fetch(urlWithParams, {
                method: "GET", // Set the HTTP method to POST
                headers: {
                    "Content-Type": "application/json" // Set the content type header
                },
                ///body: JSON.stringify(data) // Send the data object as the request body
                })
                .then(response => response.json()) // Parse the JSON response
            .then(data => {

            console.log(data);
            if (data.success) {
                const campaigns = data.data;
                const total_donation=0
                const totalDonations = data.data.total_donations;
                const fundraisingtarget = data.data.fundraisingtarget;
                if(totalDonations == fundraisingtarget)
                {
                    return true;
                }
                else{
                    return false;
                }

             // Redirect to a protected page or show success message
            } else {
                return false;
            }
        })
        .catch(error => {
            return false;
        });


    }
    function message(msg)
  {
      swal({
                              title: "Success",
                              text: msg,
                              type: "success",
                              showCancelButton: false,
                              confirmButtonColor: "#DD6B55",
                              confirmButtonText: "Ok!",
                              cancelButtonText: "No, cancel plx!",
                              closeOnConfirm: true,
                              closeOnCancel: false },
                          function (isConfirm) {
                              if (isConfirm) {
      //                            window.location.href = "login";
                              }
                          });

  }

  function warning_error_message(message, type, title)
  {
      swal({
                              title: title,
                              text: message,
                              type: type,
                              showCancelButton: false,
                              confirmButtonColor: "#DD6B55",
                              confirmButtonText: "Ok!",
                              cancelButtonText: "No, cancel plx!",
                              closeOnConfirm: true,
                              closeOnCancel: false },
                          function (isConfirm) {
                              if (isConfirm) {

                              }
                          });

  }
    </script>
