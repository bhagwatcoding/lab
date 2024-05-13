<nav aria-label="breadcrumb" role="tablist">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a data-bs-toggle='pill' href="#dashboard">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Patient Registration</li>
  </ol>
</nav>
<hr>

<!-- <h3 class="text-center">Patient Registration</h3> -->
<form>
    <div class="row">
        <div class="row">
          <div class="col-9">
            <div class="bg-white p-3 rounded">
                <h5 class="pb-2">Presonal Details</h5>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label" for="First name">First Name <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" name="" id="" required>
                    </div>

                    <div class="col">
                        <label class="form-label" for="First name">Middle Name</label>
                        <input type="text" class="form-control" name="" id="">
                    </div>

                    <div class="col">
                        <label class="form-label" for="First name">Last Name</label>
                        <input type="text" class="form-control" name="" id="">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-9">
                        <label class="form-label" for="First name">Age<b class="text-danger">*</b></label>
                        <div class="row">
                            <div class="input-group col">
                                <input type="number" class="form-control" maxlength="3" min="1" max="130" placeholder="Year">
                                <span class="input-group-text">Y</span>
                            </div>
                            <div class="input-group col">
                                <input type="number" class="form-control" maxlength="2" min="1" max="11" placeholder="Month">
                                <span class="input-group-text">M</span>
                            </div>
                            <div class="input-group col">
                                <input type="number" class="form-control" maxlength="3" min="1" max="31" placeholder="Days">
                                <span class="input-group-text">D</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <label class="form-label" for="First name">DOB</label>
                        <input type="date" class="form-control" name="" id="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Gender:</label>
                        <select class="form-select col custom-select" id="sel1" name="sellist">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Transgender</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Marital Status</label>
                        <select class="form-select col" name="sellist">
                            <option>Select</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Divorced</option>
                            <option>Separated</option>
                            <option>Widow</option>
                            <option>Widower</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="First name">Father / Spouse Name</label>
                        <input type="text" class="form-control" name="" id="">
                    </div>
                </div>
</div>
                <div class="mt-4 bg-white p-3 rounded">
                    <h5 class="pb-2">Communications</h5>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Mobile No</label>
                            <div class="input-group">
                                <span class="input-group-text">+91</span>
                                <input type="tel" class="form-control" maxlength="10" minlength=""
                                    placeholder="9876543210">
                            </div>
                        </div>
                        <div class="col-8">
                            <label class="form-label" for="First name">Email</label>
                            <div class="input-group col">
                                <span class="input-group-text">✉</span>
                                <input type="email" class="form-control" placeholder="abc@gmail.com">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 bg-white p-3 rounded">
                    <h5 class="pb-2">OPD Details</h5>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">OPD Type *</label>
                            <select class="form-select col" id="sel1" name="sellist">
                                <option>Select</option>
                                <option>ENT</option>
                                <option>Dental</option>
                                <option>General Physician</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <label class="form-label" for="First name">Doctor</label>
                            <select class="form-select col" id="sel1" name="sellist">
                                <option>Select</option>
                                <option>Dr. Nikunj</option>
                                <option>ShahanBaz Anwar</option>
                                <option>Kamlesh Kumar</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>


            <!-- Right Panel -->
            <div class="col-3 bg-white p-3 rounded">
                <h5 class="pb-2">Address</h5>
                <div class="row mb-3 mt-3">
                    <label class="form-label">State:</label>
                    <select class="form-select col" id="sel1" name="sellist" disabled>
                        <option>Bihar</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <label class="form-label">District</label>
                    <select class="form-select col" name="sellist">
                        <option>Select</option>
                        <option>Begusarai</option>
                        <option>Hasanpur</option>
                        <option>Samastipur</option>
                        <option>Khagariya</option>
                        <option>Darbhanga</option>
                        <option>Muzaffarpur</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <label class="form-label">Block</label>
                    <select class="form-select col" name="sellist">
                        <option>Select</option>
                        <option>Bakhri</option>
                        <option>Chhaurahi</option>
                        <option>Khodabandpur</option>
                        <option>Gadhpura</option>
                        <option>Cheriya Bariyarpur</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <label class="form-label" for="First name">Panchayat</label>
                    <input type="text" class="form-control" name="" id="">
                </div>
                <div class="row mb-3">
                    <label class="form-label" for="First name">Post Office</label>
                    <input type="text" class="form-control" name="" id="">
                </div>
                <div class="row mb-3">
                    <label class="form-label" for="First name">Police Station</label>
                    <input type="text" class="form-control" name="" id="">
                </div>
                <div class="row mb-3">
                    <label class="form-label" for="First name">Ward</label>
                    <input type="Number" class="form-control" name="" id="">
                </div>
                <div class="row mb-3">
                    <label class="form-label" for="First name">Pin Code</label>
                    <input type="Number" class="form-control" name="" id="">
                </div>
            </div>
        </div>
    </div>
</form>
