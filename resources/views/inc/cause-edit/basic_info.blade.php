<!-- Begin What's Your First Name Field -->
<div class="hs_firstname field hs-form-field">
    <label for="firstname-99a6d115-5e68-4355-a7d0-529207feb0b3_2983">Fund Raise Title *</label>
    <input id="firstname-99a6d115-5e68-4355-a7d0-529207feb0b3_2983" name="title" required="required" type="text"
           value="{{$cause->cause_title}}" placeholder="" data-rule-required="true" data-msg-required="Please include your first name" >
    <span class="error1" style="display: none;"><i class="error-log fa fa-exclamation-triangle"></i></span>
</div>
<!-- End What's Your First Name Field -->
<!-- Begin What's Your Email Field -->
<div class="hs_email field hs-form-field">
    <label for="email-99a6d115-5e68-4355-a7d0-529207feb0b3_2983">Fund category *</label>
    <select class="form-control" id="category" name="category">
        <option selected disabled>Select Category</option>
        @forelse ($categories as $category)
            <option value="{{ $category->id }}" {{$category->id == $cause->category_id ? 'selected' : ''}}>{{ $category->category }}</option>
        @empty
            <option value="" disabled>No data found</option>
        @endforelse
    </select>
    <span class="error1" style="display: none;">
        <i class="error-log fa fa-exclamation-triangle"></i>
    </span>
</div>
<!-- End What's Your Email Field -->
<!-- Begin What's Your Email Field -->
<div class="hs_email field hs-form-field">
    <label for="email-99a6d115-5e68-4355-a7d0-529207feb0b3_2983">Fund Subcategory *</label>
    <select class="form-control" id="subcategory" name="subcategory">
        <option selected disabled>Select Category</option>
        @if(!empty($subcategories))
            @foreach($subcategories as $subcategory)
                <option value="{{$subcategory->id}}" {{$subcategory->id == $cause->sub_category_id ? 'selected' : ''}}>
                    {{$subcategory->sub_category}}</option>
            @endforeach
        @endif
    </select>
    <span class="error1" style="display: none;">
        <i class="error-log fa fa-exclamation-triangle"></i>
    </span>
</div>
<!-- End What's Your Email Field -->
<!-- Begin What's Your First Name Field -->
<div class="hs_firstname field hs-form-field">
    <label for="firstname-99a6d115-5e68-4355-a7d0-529207feb0b3_2983">When You need *</label>
    <input id="date_by_when_you_need" name="date_by_when_you_need"
            type="date" value="{{$cause->date_by_when_you_need}}" placeholder=""
           data-msg-required="Please include your first name" >
    <span class="error1" style="display: none;"><i class="error-log fa fa-exclamation-triangle"></i></span>
</div>
<!-- End What's Your First Name Field -->
<!-- Begin Total Number of Constituents in Your Database Field -->
<div class="hs_email field hs-form-field hs_total_number_of_constituents_in_your_database">
    <label for="edit-submitted-constituent-base-total-constituents ">Amount *</label>
    <input id="amount" class="form-text hs-input"
           name="amount" required="required" size="60" maxlength="128" type="number"
           value="{{$cause->amount}}"
           placeholder="" data-rule-required="true" data-msg-required="Please enter a valid number" >
    <span class="error1" style="display: none;"><i class="error-log fa fa-exclamation-triangle"></i></span>
</div>
<!-- End Total Number of Constituents in Your Database Field -->
