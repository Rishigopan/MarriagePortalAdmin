//Get all star
function ShowStar() {
  var GetStar = "FetchStar";
  $.ajax({
    type: "POST",
    url: "FilterExtras.php",
    data: {
      GetStar: GetStar,
    },
    success: function (data) {
      //console.log('star');
      //console.log(data);
      var ResultStarData = JSON.parse(data);
      document.querySelector(".SelectStar").setOptions(ResultStarData);
    },
  });
}


//Get all education categories
function ShowEducationCat() {
  var GetEducationCat = "FetchEducationCat";
  $.ajax({
    type: "POST",
    url: "FilterExtras.php",
    data: {
      GetEducationCat: GetEducationCat,
    },
    success: function (data) {
      console.log(data);
      var ResultEducationCatData = JSON.parse(data);
      document.querySelector(".SelectEdCat").setOptions(ResultEducationCatData);
    },
  });
}

//Get all job categories
function ShowJobCat() {
  var GetJobCat = "FetchJobCat";
  $.ajax({
    type: "POST",
    url: "FilterExtras.php",
    data: {
      GetJobCat: GetJobCat,
    },
    success: function (data) {
      //console.log('Job cat');
      //console.log(data);
      var ResultJobCatData = JSON.parse(data);
      document.querySelector(".SelectJobCat").setOptions(ResultJobCatData);
    },
  });
}

//Get all job types
function ShowJobType() {
  var GetJobTypes = "FetchJobType";
  $.ajax({
    type: "POST",
    url: "FilterExtras.php",
    data: {
      GetJobTypes: GetJobTypes,
    },
    success: function (data) {
      //console.log('Job cat');
      //console.log(data);
      var ResultJobTypeData = JSON.parse(data);
      document.querySelector(".SelectJobType").setOptions(ResultJobTypeData);
    },
  });
}

//Get all country
function ShowCountry() {
  var GetCountry = "FetchCountry";
  $.ajax({
    type: "POST",
    url: "FilterExtras.php",
    data: {
      GetCountry: GetCountry,
    },
    success: function (data) {
      //console.log('country');
      //console.log(data);
      var ResultCountryData = JSON.parse(data);
      document.querySelector(".SelectCountry").setOptions(ResultCountryData);
    },
  });
}

//Get all district
function ShowDistrict() {
  var GetDistrict = "FetchDistrict";
  $.ajax({
    type: "POST",
    url: "FilterExtras.php",
    data: {
      GetDistrict: GetDistrict,
    },
    success: function (data) {
      //console.log('district');
      //console.log(data);
      var ResultDistrictData = JSON.parse(data);
      document.querySelector(".SelectDistrict").setOptions(ResultDistrictData);
    },
  });
}

// Get all religion
function ShowReligion() {
  var GetReligion = "FetchReligion";
  $.ajax({
    type: "POST",
    url: "FilterExtras.php",
    data: {
      GetReligion: GetReligion,
    },
    success: function (data) {
      //console.log('Religion');
      //console.log(data);
      var ResultReligionData = JSON.parse(data);
      document.querySelector(".SelectReligion").setOptions(ResultReligionData);
    },
  });
}

///Select caste based on religion
$(document).on("change", ".SelectReligion", function () {
  var ReligionId = $(this).val();
  if (ReligionId == "") {
    ReligionId = 0;
  }
  //console.log(ReligionId);
  $.ajax({
    type: "POST",
    url: "FilterExtras.php",
    data: {
      ReligionId: ReligionId,
    },
    success: function (data) {
      //console.log(data);
      var ResultCasteData = JSON.parse(data);
      document.querySelector(".SelectCaste").setOptions(ResultCasteData);
    },
  });
});



//Select education type based on education category
$(document).on("change", ".SelectEdCat", function () {
  var EdCatId = $(this).val();
  if (EdCatId.length === 0) {
    //EdCatId.push(0);
  } else {
    //EdCatId.pop(0);
    $.ajax({
      type: "POST",
      url: "FilterExtras.php",
      data: {
        EdCatId: EdCatId,
      },
      success: function (data) {
        //console.log(data);
        var ResultEdTypeData = JSON.parse(data);
        document.querySelector(".SelectEdType").setOptions(ResultEdTypeData);
      },
    });
  }
});



//Select State based on country
$(document).on("change", ".SelectCountry", function () {
    var CountryId = $(this).val();
    if (CountryId.length === 0) {
        //CountryId.push(0);
    }
    console.log(CountryId);
    $.ajax({
        type: "POST",
        url: "FilterExtras.php",
        data: {
            CountryId: CountryId
        },
        success: function(data) {
            //console.log(data);
            var ResultStateData = JSON.parse(data);
            document.querySelector('.SelectState').setOptions(ResultStateData);
        }
    });
});




//Select District based on State
$(document).on("change", ".SelectState", function () {
    var StateId = $(this).val();
    if (StateId.length === 0) {
        //StateId.push(0);
    }
    // console.log(StateId);
    $.ajax({
        type: "POST",
        url: "FilterExtras.php",
        data: {
            StateId: StateId
        },
        success: function(data) {
            //console.log(data);
            var ResultDistrictData = JSON.parse(data);
            document.querySelector('.SelectDistrict').setOptions(ResultDistrictData);
        }
    });
});