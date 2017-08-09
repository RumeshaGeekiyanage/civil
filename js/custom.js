function insertData() {
	try {
		/* ****** 1 Section ****** */
		var s1name = $("[name = '1name']").val();
		var s1address = $("[name = '1address']").val();
		var s1telephoneNo = $("[name = '1telephoneNo']").val();
		var s1dob = $("[name = '1dob']").val();
		var s1numchildren = $("[name = '1numchildren']").val();
		var s1citizen = $("[name = '1citizen']").val();
		var s1nic = $("[name = '1nic']").val();
		var s1nicIssueDate = $("[name = '1nicIssueDate']").val();

		if($('#1genderM').is(':checked')) {
			var s1gender = 1;
		} else if($('#1genderF').is(':checked')) {
			var s1gender = 0;
		}

		if($('#married').is(':checked')) {
			var s1civilStatus = 1;
		} else if($('#sigle').is(':checked')) {
			var s1civilStatus = 0;
		}

		if($('#citizen').is(':checked')) {
			var s1citizen = 1;
		} else if($('#nonCitizen').is(':checked')) {
			var s1citizen = 0;
		}



		/* ****** 2 Section ****** */
		var s2district = $("[name = '2district']").val();
		var s2gSDivision = $("[name = '2gSDivision']").val();
		var s2policeArea = $("[name = '2policeArea']").val();


		/* ****** 3 Section ****** */
		var s3occupation = $("[name = '3occupation']").val();
		var s3avgIncome = $("[name = '3avgIncome']").val();
		var s3taxNumber = $("[name = '3taxNumber']").val();

		if($('#show_tax').is(':checked')) {
			var s3taxPay = 1;
		} else if($('#hide_tax').is(':checked')) {
			var s3taxPay = 0;
		}



		/* ****** 4 Section ****** */
		if($('#offenceY').is(':checked')) {
			var s4chargedOffence = 1;
		} else if($('#offenceN').is(':checked')) {
			var s4chargedOffence = 0;
		}


		/* ****** 5 Section ****** */
		var s5landName = $("[name = '5landName']").val();
		var s5district = $("[name = '5district']").val();
		var s5acres = $("[name = '5acres']").val();
		var s5crop = $("[name = '5crop']").val();
		var s5cultivatedAcres = $("[name = '5cultivatedAcres']").val();
		var s5animal = $("[name = '5animal']").val();
		var s5cultivationLoss = $("[name = '5cultivationLoss']").val();

		var s5farmName = $("[name = '5farmName']").val();
		var s5dDsGsArea = $("[name = '5dDsGsArea']").val();
		var s5livestocktype = $("[name = '5livestocktype']").val();
		var s5farmValue = $("[name = '5farmValue']").val();
		var s5livestockLoss = $("[name = '5livestockLoss']").val();

		if($('#cultivationY').is(':checked')) {
			var s5category = 1;
		} else if($('#livestockY').is(':checked')) {
			var s5category = 2;
		}


		/* ****** 6 Section ****** */
		var s6date = $("[name = '6date']").val();
		var s6gunType = $("[name = '6gunType']").val();
		var s6licence = $("[name = '6licence']").val();
		var s6toWhomTransf = $("[name = '6toWhomTransf']").val();
		var s6receipts = $("[name = '6receipts']").val();

		if($('#stolenTransY').is(':checked')) {
			var s6stolentransf = 1;
		} else if($('#stolenTransN').is(':checked')) {
			var s6stolentransf = 0;
		}

		if($('#stolenPropEntryY').is(':checked')) {
			var s6properEntry = 1;
		} else if($('#stolenPropEntryN').is(':checked')) {
			var s6properEntry = 0;
		}



		/* ****** 7 Section ****** */
		if($('#gunsY').is(':checked')) {
			var s7gunPossess = 1;
		} else if($('#gunsN').is(':checked')) {
			var s7gunPossess = 0;
		}


		/* ****** 8 Section ****** */
		var s8gunType = $("[name = '8gunType']").val();
		var s8licence = $("[name = '8licence']").val();

		if($('#serviceWeaponY').is(':checked')) {
			var s8serviceWeapon = 1;
		} else if($('#serviceWeaponN').is(':checked')) {
			var s8serviceWeapon = 0;
		}


		/* ****** 9 Section ****** */
		if($('#s9authGS').is(':checked')) {
			var s9authGS = 1;
		}

		if($('#s9authSP').is(':checked')) {
			var s9authSP = 1;
		}

		if($('#s9authDS').is(':checked')) {
			var s9authDS = 1;
		} 

		if($('#s9authGA').is(':checked')) {
			var s9authGA = 1;
		}

		if($('#s9authAS').is(':checked')) {
			var s9authAS = 1;
		}

		if($('#s9authSe').is(':checked')) {
			var s9authSe = 1;
		}

		if(s9authGS == 1 && s9authSP == 1 && s9authDS == 1 && s9authGA == 1 && s9authAS == 1 && s9authSe == 1) {
			var s9authentications = 1;
		} else {
			var s9authentications = 0;
		}	


		if(s9authentications == 1) {
			$.ajax({
				type: "POST",
				url: "insertAgriculture.php",
				data: "s1name="+s1name+"&s1address="+s1address+"&s1telephoneNo="+s1telephoneNo+"&s1dob="+s1dob+"&s1gender="+s1gender+"&s1civilStatus="+s1civilStatus+"&s1numchildren="+s1numchildren+"&s1citizen="+s1citizen+"&s1nic="+s1nic+"&s1nicIssueDate="+s1nicIssueDate+
				"&s2district="+s2district+"&s2gSDivision="+s2gSDivision+"&s2policeArea="+s2policeArea+
				"&s3occupation="+s3occupation+"&s3avgIncome="+s3avgIncome+"&s3taxPay="+s3taxPay+"&s3taxNumber="+s3taxNumber+
				"&s4chargedOffence="+s4chargedOffence+
				"&s5category="+s5category+
				"&s5landName="+s5landName+"&s5district="+s5district+"&s5acres="+s5acres+"&s5crop="+s5crop+"&s5cultivatedAcres="+s5cultivatedAcres+"&s5animal="+s5animal+"&s5cultivationLoss="+s5cultivationLoss+
				"&s5farmName="+s5farmName+"&s5dDsGsArea="+s5dDsGsArea+"&s5livestocktype="+s5livestocktype+"&s5farmValue="+s5farmValue+"&s5livestockLoss="+s5livestockLoss+
				"&s6stolentransf="+s6stolentransf+"&s6date="+s6date+"&s6gunType="+s6gunType+"&s6licence="+s6licence+"&s6toWhomTransf="+s6toWhomTransf+"&s6receipts="+s6receipts+"&s6properEntry="+s6properEntry+
				"&s7gunPossess="+s7gunPossess+
				"&s8serviceWeapon="+s8serviceWeapon+"&s8gunType="+s8gunType+"&s8licence="+s8licence+
				"&s9authentications="+s9authentications,
				dataType: "text",
				success: function(msg) {
					alert("Data Insert Successfull!");	// Change later
					window.location.assign("documentsUpload.php");
				}
			});
		} else if(s9authentications == 0) {
			alert("Data Insert Denied. Application does not have proper Authenticatons!"); // Change this as a modal
			return false;
		}
		
	} catch(ex) {
		alert(ex);
	}
}



/* *********************************************************************** */



function insertOffenceData() {
	try {
		var nicTemp = $("[name = '1nic']").val();	// Validate the NIC using a seperate function

		if(nicTemp == "" || nicTemp == null) {
			alert("Fill NIC Offence");
		} else {
			var nic = nicTemp;
			var year = $("[name = '4offenceYear']").val();
			var court = $("[name = '4court']").val();
			var offence = $("[name = '4offence']").val();
			var judgment = $("[name = '4judgement']").val();

			$.ajax({
				type: "POST",
				url: "tempData.php",
				data: "nic="+nic+"&y="+year+"&c="+court+"&o="+offence+"&j="+judgment,
				dataType: "html",
				success: function(msg) {
					alert("Offence Data Insert Successfull!");	// Remove later
					$("#offenceTable").html(msg);
					$("#s4year, #s4Court, #s4Offence, #s4judgement").val("");
				}
			});
		}
	} catch(ex) {
		alert(ex);
	}
}



function insertGunsData() {
	try {
		var nicTemp = $("[name = '1nic']").val();	// Validate the NIC using a seperate function

		if(nicTemp == "" || nicTemp == null) {
			alert("Fill NIC Guns");
			return false;
		} else {
			var nic = nicTemp;
			var acqDate = $("[name = '7acqDate']").val();
			var typeNo = $("[name = '7gunType']").val();
			var licenceNo = $("[name = '7licence']").val();

			$.ajax({
				type: "POST",
				url: "tempData.php",
				data: "nic="+nic+"&a="+acqDate+"&t="+typeNo+"&l="+licenceNo,
				dataType: "html",
				success: function(msg) {
					alert("Guns Data Insert Successfull!");	// Remove later
					$("#gunsPossTable").html(msg);
					$("#s7acqDate, #s7gunType, #s7licence").val("");
				}
			});
		}
	} catch(ex) {
		alert(ex);
	}
}



/* **************************************************************** */



function deleteOffence(x, e) {
	try {
		e.preventDefault();
	
		$.ajax({
			type: "POST",
			url: "deleteTempData.php",
			data: "o="+x,
			dataType: "html",
			success: function(msg) {
				alert("Offence entry deleted Successfully!");	// Remove later
				$("#offenceTable").html(msg);
			}
		});
	} catch(ex) {
		alert(ex);
	}
}



function deleteGunsPoss(x, e) {
	try {
		e.preventDefault();

		$.ajax({
			type: "POST",
			url: "deleteTempData.php",
			data: "g="+x,
			dataType: "html",
			success: function(msg) {
				alert("Gun entry deleted Successfully!");	// Remove later
				$("#gunsPossTable").html(msg);
			}
		});
	} catch(ex) {
		alert(ex);
	}
}



/* **************************************************************** */



function autoFillPermit(x, e) {
	try {
		e.preventDefault();

		$.ajax({
			type: "POST",
			url: "autoFillPermit.php",
			data: "apID="+x,
			dataType: "json",
			success: function(msg, string, jqXHR) {
				$("#aName").val(msg.fullName);
				$("#aDOB").val(msg.dob);
				$("#aNIC").val(msg.nic);
				$("#aAddress").val(msg.address);
				$("#aDistrict").val(msg.district);
				$("#aOccupation").val(msg.occupation);

				if (typeof msg.gunDetails !== 'undefined') {
				    var gunsPoss = msg.gunDetails;

					$("#permitGunsPossTable").html(function(){
						var gunTbl = "<tr> <th>Date</th> <th>Type & No</th> <th>Licence No</th> </tr>";

						for(var i = 0; i < gunsPoss.length; i++) {
						    var obj = gunsPoss[i];

						    var acqDate = obj.acqDate;
						    var typeNbr = obj.typeNbr;
						    var licenceNo = obj.licenceNo;

						    gunTbl = gunTbl + "<tr> <td>" + acqDate + "</td> <td>" + typeNbr + "</td> <td>" + licenceNo + "</td> </tr>";
						}

						return gunTbl;
					});
				}
			}
		});
	} catch(ex) {
		alert(ex);
	}
}



/* **************************************************************** */



function applicationDetails(x) { // Not completed, Just a copy
	try {
		$.ajax({
			type: "POST",
			url: "applicationDetails.php",
			data: "apID="+x,
			dataType: "json",
			success: function(msg, string, jqXHR) {
				if (typeof msg.gunDetails !== 'undefined') {
				    var application = msg.application;

					$("#permitGunsPossTable").html(function(){
						var gunTbl = "<tr> <th>Date</th> <th>Type & No</th> <th>Licence No</th> </tr>";

						for(var i = 0; i < application.length; i++) {
						    var obj = application[i];

						    var acqDate = obj.acqDate;
						    var typeNbr = obj.typeNbr;
						    var licenceNo = obj.licenceNo;

						    gunTbl = gunTbl + "<tr> <td>" + acqDate + "</td> <td>" + typeNbr + "</td> <td>" + licenceNo + "</td> </tr>";
						}

						return gunTbl;
					});
				}
			}
		});

	} catch(ex) {
		alert(ex);
	}
}



/* **************************************************************** */



function postedReturned(x, y) {
	try {
		$.ajax({
			type: "POST",
			url: "updatePostedReturnedList.php",
			data: "l="+x+"&apID="+y,
			success: function() {
				if(x == "p") {
					alert("Added to Posted List Successfully!");
				} else if(x == "r") {
					alert("Added to Returned List Successfully!");
				}

				window.location = "sCAgri.php";
			}
		});

	} catch(ex) {
		alert(ex);
	}
}