$(document).ready(function(){
    /* ****** Agriculture Application ****** */

    $("#numChild").hide();
    $("#tax").hide();
    $("#reg").hide();
    $("#offenceDetailsDiv").hide();
    $("#cultivationDiv").hide();                    
    $("#serviceWeaponDiv").hide();
    $("#livestockDiv").hide();
    $("#gunsPossDiv").hide();
    $("#stolenTransDiv").hide();
    $("#nicDiv").hide();
	$("#marryDiv").hide();



    $("#sigle").click(function(){
        $("#numChild").hide();
    });
    $("#married").click(function(){
        $("#numChild").show();
    });

    $("#hide_tax").click(function(){
        $("#tax").hide();
    });
    $("#show_tax").click(function(){
        $("#tax").show();
    });

    $("#decendent").click(function(){
        $("#reg").hide();
    });
    $("#registraion").click(function(){
        $("#reg").show();
    });

    $("#offenceN").click(function(){
        $("#offenceDetailsDiv").hide();
    });
    $("#offenceY").click(function(){
        $("#offenceDetailsDiv").show();
    });

    $("#cultivationN").click(function(){
        $("#cultivationDiv").hide();
    });
    $("#cultivationY").click(function(){
        $("#cultivationDiv").show();
    });

    $("#serviceWeaponN").click(function(){
        $("#serviceWeaponDiv").hide();
    });
    $("#serviceWeaponY").click(function(){
        $("#serviceWeaponDiv").show();
    });

    $("#livestockN").click(function(){
        $("#livestockDiv").hide();
    });
    $("#livestockY").click(function(){
        $("#livestockDiv").show();
    });

    $("#gunsN").click(function(){
        $("#gunsPossDiv").hide();
    });
    $("#gunsY").click(function(){
        $("#gunsPossDiv").show();
    });

    $("#stolenTransN").click(function(){
        $("#stolenTransDiv").hide();
    });
    $("#stolenTransY").click(function(){
        $("#stolenTransDiv").show();
    });
	$("#single").click(function(){
		//alert("gdsjh");	
        $("#marryDiv").hide();
    });
    $("#married").click(function(){
		//alert("gdsjh");	
        $("#marryDiv").show();
    });
    $("#citizenN").click(function(){
		//alert("sjsjsjjs");
        $("#nicDiv").hide();
    });
    $("#citizenY").click(function(){
		//alert("sjsjsjjs");
        $("#nicDiv").show();
    });
	



    /* ****** File Upload ****** */

    $("#dUOriAppBtn").click(function () {
        $("#dUOriApp").trigger('click');
    });
    $("#dUOriApp").on('change', function() {
        var val = $("#dUOriApp")[0].files[0].name;
        $(this).siblings("#dUOriAppSpan").text(val);
    });

    $("#dUNICBtn").click(function () {
        $("#dUNIC").trigger('click');
    });
    $("#dUNIC").on('change', function() {
        var val = $("#dUNIC")[0].files[0].name;
        $(this).siblings("#dUNICSpan").text(val);
    });

    $("#dURevLicBtn").click(function () {
        $("#dURevLic").trigger('click');
    });
    $("#dURevLic").on('change', function() {
        var val = $("#dURevLic")[0].files[0].name;
        $(this).siblings("#dURevLicSpan").text(val);
    });

    $("#dUAsComRepBtn").click(function () {
        $("#dUAsComRep").trigger('click');
    });
    $("#dUAsComRep").on('change', function() {
        var val = $("#dUAsComRep")[0].files[0].name;
        $(this).siblings("#dUAsComRepSpan").text(val);
    });

    $("#dUVetSurRepBtn").click(function () {
        $("#dUVetSurRep").trigger('click');
    });
    $("#dUVetSurRep").on('change', function() {
        var val = $("#dUVetSurRep")[0].files[0].name;
        $(this).siblings("#dUVetSurRepSpan").text(val);
    });

    $("#dULandDeedBtn").click(function () {
        $("#dULandDeed").trigger('click');
    });
    $("#dULandDeed").on('change', function() {
        var val = $("#dULandDeed")[0].files[0].name;
        $(this).siblings("#dULandDeedSpan").text(val);
    });

    $("#dULandOConsentBtn").click(function () {
        $("#dULandOConsent").trigger('click');
    });
    $("#dULandOConsent").on('change', function() {
        var val = $("#dULandOConsent")[0].files[0].name;
        $(this).siblings("#dULandOConsentSpan").text(val);
    });

    $("#dURecDSBtn").click(function () {
        $("#dURecDS").trigger('click');
    });
    $("#dURecDS").on('change', function() {
        var val = $("#dURecDS")[0].files[0].name;
        $(this).siblings("#dURecDSSpan").text(val);
    });

    $("#dUMarriageCBtn").click(function () {
        $("#dUMarriageC").trigger('click');
    });
    $("#dUMarriageC").on('change', function() {
        var val = $("#dUMarriageC")[0].files[0].name;
        $(this).siblings("#dUMarriageCSpan").text(val);
    });

    $("#dUDivAgDevComBtn").click(function () {
        $("#dUDivAgDevCom").trigger('click');
    });
    $("#dUDivAgDevCom").on('change', function() {
        var val = $("#dUDivAgDevCom")[0].files[0].name;
        $(this).siblings("#dUDivAgDevComSpan").text(val);
    });

    $("#dUDisAgDevComBtn").click(function () {
        $("#dUDisAgDevCom").trigger('click');
    });
    $("#dUDisAgDevCom").on('change', function() {
        var val = $("#dUDisAgDevCom")[0].files[0].name;
        $(this).siblings("#dUDisAgDevComSpan").text(val);
    });

});