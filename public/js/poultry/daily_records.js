"use strict";

var dailyrecords =
{
  mortality_members: function (family_id)
  {
     $.ajax({
      url: '/breeder_daily_records/mortality_member_list',
      type: 'GET',
      cache: false,
      data: family_id,
      success: function(data)
      {
        console.log("bobo");
      }

    });
  }

}
