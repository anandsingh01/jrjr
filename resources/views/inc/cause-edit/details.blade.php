<h3 class="fs-subtitle">Let's talk about your donations as a whole</h3>
<!-- Begin Total Giving In Year 1 Field -->
<div class="form-item webform-component webform-component-textfield" id="webform-component-cultivation--amount-3 hs_total_giving_in_year_1 field hs-form-field">
    <div class="form-group">
        <label>Relation With Patient</label>
        <select class="form-select nice-select form-select-solid form-select-lg" name="relation">
            <option value="myself" {{$cause->causePatient->relation_with_patient == 'myself' ? 'selected' : ''}}>Myself</option>
            <option value="father" {{$cause->causePatient->relation_with_patient == 'father' ? 'selected' : ''}}>Father</option>
            <option value="mother" {{$cause->causePatient->relation_with_patient == 'mother' ? 'selected' : ''}}>Mother</option>
            <option value="brother" {{$cause->causePatient->relation_with_patient == 'brother' ? 'selected' : ''}}>Brother</option>
            <option value="sister" {{$cause->causePatient->relation_with_patient == 'sister' ? 'selected' : ''}}>Sister</option>
            <option value="cousin"{{$cause->causePatient->relation_with_patient == 'cousin' ? 'selected' : ''}} >Cousins</option>
            <option value="uncle" {{$cause->causePatient->relation_with_patient == 'uncle' ? 'selected' : ''}}>Uncle</option>
            <option value="aunt" {{$cause->causePatient->relation_with_patient == 'aunt' ? 'selected' : ''}}>Aunt</option>
            <option value="other" {{$cause->causePatient->relation_with_patient == 'other' ? 'selected' : ''}}>Other</option>
        </select>
    </div>

</div>
<!-- End Total Giving In Year 1 Field -->
<!-- Begin Total Giving In Year 2 Field -->
<div class="form-item webform-component webform-component-textfield hs_total_giving_in_year_2 field hs-form-field" id="webform-component-cultivation--amount-4">
    <label>Address</label>
    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{$cause->causePatient->address}}">
    <span class="error1" style="display: none;"><i class="error-log fa fa-exclamation-triangle"></i></span>
</div>
<!-- End Total Giving In Year 2 Field -->
<!-- Begin Total Giving In Year 1 Field -->
<div class="form-item webform-component webform-component-textfield"
     id="webform-component-cultivation--amount-3 hs_total_giving_in_year_1 field hs-form-field">
    <div class="form-group">

        <label>State</label>
        <select name="state" data-control=" select2" class="form-select nice-select form-select-solid form-select-lg">
            <option value="Andhra Pradesh" {{$cause->causePatient->state == 'Andhra Pradesh' ? 'selected' : ''}}>Andhra Pradesh</option>
            <option value="Andaman and Nicobar Islands" {{$cause->causePatient->state == 'Andaman and Nicobar Islands' ? 'selected' : ''}}>Andaman and Nicobar Islands</option>
            <option value="Arunachal Pradesh" {{$cause->causePatient->state == 'Arunachal Pradesh' ? 'selected' : ''}}>Arunachal Pradesh</option>
            <option value="Assam" {{$cause->causePatient->state == 'Assam' ? 'selected' : ''}}>Assam</option>
            <option value="Bihar" {{$cause->causePatient->state == 'Bihar' ? 'selected' : ''}}>Bihar</option>
            <option value="Chandigarh" {{$cause->causePatient->state == 'Chandigarh' ? 'selected' : ''}}>Chandigarh</option>
            <option value="Chhattisgarh" {{$cause->causePatient->state == 'Chhattisgarh' ? 'selected' : ''}}>Chhattisgarh</option>
            <option value="Dadar and Nagar Haveli" {{$cause->causePatient->state == 'Dadar and Nagar Haveli' ? 'selected' : ''}}>Dadar and Nagar Haveli</option>
            <option value="Daman and Diu" {{$cause->causePatient->state == 'Daman and Diu' ? 'selected' : ''}}>Daman and Diu</option>
            <option value="Delhi" {{$cause->causePatient->state == 'Delhi' ? 'selected' : ''}}>Delhi</option>
            <option value="Lakshadweep" {{$cause->causePatient->state == 'Lakshadweep' ? 'selected' : ''}}>Lakshadweep</option>
            <option value="Puducherry" {{$cause->causePatient->state == 'Puducherry' ? 'selected' : ''}}>Puducherry</option>
            <option value="Goa" {{$cause->causePatient->state == 'Goa' ? 'selected' : ''}}>Goa</option>
            <option value="Gujarat" {{$cause->causePatient->state == 'Gujarat' ? 'selected' : ''}}>Gujarat</option>
            <option value="Haryana" {{$cause->causePatient->state == 'Haryana' ? 'selected' : ''}}>Haryana</option>
            <option value="Himachal Pradesh" {{$cause->causePatient->state == 'Himachal Pradesh' ? 'selected' : ''}}>Himachal Pradesh</option>
            <option value="Jammu and Kashmir" {{$cause->causePatient->state == 'Jammu and Kashmir' ? 'selected' : ''}}>Jammu and Kashmir</option>
            <option value="Jharkhand" {{$cause->causePatient->state == 'Jharkhand' ? 'selected' : ''}}>Jharkhand</option>
            <option value="Karnataka" {{$cause->causePatient->state == 'Karnataka' ? 'selected' : ''}}>Karnataka</option>
            <option value="Kerala" {{$cause->causePatient->state == 'Kerala' ? 'selected' : ''}}>Kerala</option>
            <option value="Madhya Pradesh" {{$cause->causePatient->state == 'Madhya Pradesh' ? 'selected' : ''}}>Madhya Pradesh</option>
            <option value="Maharashtra" {{$cause->causePatient->state == 'Maharashtra' ? 'selected' : ''}}>Maharashtra</option>
            <option value="Manipur" {{$cause->causePatient->state == 'Manipur' ? 'selected' : ''}}>Manipur</option>
            <option value="Meghalaya" {{$cause->causePatient->state == 'Meghalaya' ? 'selected' : ''}}>Meghalaya</option>
            <option value="Mizoram" {{$cause->causePatient->state == 'Mizoram' ? 'selected' : ''}}>Mizoram</option>
            <option value="Nagaland" {{$cause->causePatient->state == 'Nagaland' ? 'selected' : ''}}>Nagaland</option>
            <option value="Odisha" {{$cause->causePatient->state == 'Odisha' ? 'selected' : ''}}>Odisha</option>
            <option value="Punjab" {{$cause->causePatient->state == 'Punjab' ? 'selected' : ''}}>Punjab</option>
            <option value="Rajasthan" {{$cause->causePatient->state == 'Rajasthan' ? 'selected' : ''}}>Rajasthan</option>
            <option value="Sikkim" {{$cause->causePatient->state == 'Sikkim' ? 'selected' : ''}}>Sikkim</option>
            <option value="Tamil Nadu" {{$cause->causePatient->state == 'Tamil Nadu' ? 'selected' : ''}}>Tamil Nadu</option>
            <option value="Telangana" {{$cause->causePatient->state == 'Telangana' ? 'selected' : ''}}>Telangana</option>
            <option value="Tripura" {{$cause->causePatient->state == 'Tripura' ? 'selected' : ''}}>Tripura</option>
            <option value="Uttar Pradesh" {{$cause->causePatient->state == 'Uttar Pradesh' ? 'selected' : ''}}>Uttar Pradesh</option>
            <option value="Uttarakhand" {{$cause->causePatient->state == 'Uttarakhand' ? 'selected' : ''}}>Uttarakhand</option>
            <option value="West Bengal" {{$cause->causePatient->state == 'West Bengal' ? 'selected' : ''}}>West Bengal</option>
        </select>
    </div>
</div>
<!-- Begin Average Gift Size Percent Change Field 2 -->
<!-- THIS FIELD IS NOT EDITABLE | GRAYED OUT -->
<div class="form-item webform-component webform-component-textfield webform-container-inline hs_total_giving_percent_change field hs-form-field" id="webform-component-cultivation--percent-change2">
    <label>Locality</label>
    <input type="text" name="city" class="form-control"
           placeholder="Enter Locality" value="{{$cause->causePatient->locality}}">
</div>

<!-- Begin Average Gift Size Percent Change Field 2 -->
<!-- THIS FIELD IS NOT EDITABLE | GRAYED OUT -->
<div class="form-item webform-component webform-component-textfield webform-container-inline hs_total_giving_percent_change field hs-form-field" id="webform-component-cultivation--percent-change2">
    <label>pincode</label>
    <input type="text" name="pincode" class="form-control"
           placeholder="Enter pincode" value="{{$cause->causePatient->pincode}}">
</div>
<!-- End Average Gift Size Percent Change Field 2 -->
{{--                                <input type="button" data-page="4" name="previous" class="previous action-button" value="Previous" />--}}
{{--                                <input type="button" data-page="4" name="next" class="next action-button" value="Next" />--}}
