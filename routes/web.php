<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailController;
use App\Http\Controllers\BsauthController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\ImportsController;
use App\Http\Controllers\nic\NicController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\ExportersController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\HumanSampleController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\impexp\ImportController;
use App\Http\Controllers\frontend\PagesController;
use App\Http\Controllers\icmr\NocIssuedController;
use App\Http\Controllers\icmr\ImporticmrController;
use App\Http\Controllers\impexp\ExporterController;
use App\Http\Controllers\impexp\NocIssueController;
use App\Http\Controllers\admin\HomeBannerController;
use App\Http\Controllers\icmr\ExportericmrController;
use App\Http\Controllers\impexp\RegistrationController;
use App\Http\Controllers\nic\RegistrationnicController;
use App\Http\Controllers\admin\ForgotPasswordController;
use App\Http\Controllers\committee\ImportcommController;
use App\Http\Controllers\icmr\RegistrationicmrController;
use App\Http\Controllers\committee\ExportercommController;
use App\Http\Controllers\committee\NocIssuedcommController;
use App\Http\Controllers\committee\RegistrationicommController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//    // return view('welcome');

// 	 return view('index');
// });


Route::get('/',[HomeController::class,'index'])->name('homepage');
Route::get('/about-us', [PagesController::class, 'about'])->name('front.about');
Route::get('/contact-us', [PagesController::class, 'contact'])->name('front.contact');

Route::group(['midddleware' => 'auth'], function()
{
     Route::get('admin/login',[AdminController::class,'loginAdmin'])->name('admin.login');
	 Route::post('admin/signin',[AdminController::class,'signinAdmin'])->name('admin.validate_login');
     Route::get('/reload-captcha1', [AdminController::class, 'reloadCaptchaAdmin'])->name('admin_login_captch');
     Route::get('admin/dashboard',[AdminController::class,'adminDashoard'])->name('admin.dashboard');
     Route::get('admin/logout',[AdminController::class,'logoutAdmin'])->name('admin.logout');
     Route::get('admin/change-password',[AdminController::class,'changePwd'])->name('admin.change_password');
     Route::post('admin/change-password',[AdminController::class,'updatePassword'])->name('admin.update_password');
     Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
     Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
     Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
     Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
	 
	 Route::get('admin/admin-otp-page', [AdminController::class, 'admin_otp_page']);
     Route::post('admin/admin_otp_submit', [AdminController::class, 'admin_otp_submit']);
	 

		Route::get('nic',[RegistrationnicController::class,'login_nic'])->name('admin.nic');
		Route::post('nic/signin',[RegistrationnicController::class,'signin_nic'])->name('nic.validate_login');
		Route::get('nic/reload-captcha1', [RegistrationnicController::class, 'reloadCaptchanic'])->name('nic_login.reloadCaptcha');
		Route::get('nic/logout',[RegistrationnicController::class,'logoutnic'])->name('nic.logout');
		Route::get('nic/send_otp_nic',[RegistrationnicController::class,'send_otp_nic']);
		Route::post('nic/submit_otp_nic',[RegistrationnicController::class,'submit_otp_nic']);
		
		Route::get('nic/forget-password', [RegistrationnicController::class, 'showForgetPwdFormNic'])->name('nic.showForgetPwdFormNic');
		Route::post('nic/forget-password', [RegistrationnicController::class, 'submitForgetPasswordNic'])->name('nic.submitForgetPasswordNic');
		Route::get('nic/forgot-email-message', [RegistrationnicController::class, 'forgetEmailMessageNic'])->name('nic.forgetEmailMessageNic');

		Route::get('nic/reset-password', [RegistrationnicController::class, 'showResetPwdFormNic'])->name('nic.showResetPwdFormNic');
		Route::post('nic/reset-password', [RegistrationnicController::class, 'submitResetPasswordNic'])->name('nic.submitResetPasswordNic');
		Route::get('nic/reset-message',[RegistrationnicController::class,'thankyouResetPasswordNic'])->name('nic.thankyouResetPasswordNic');
			
		Route::get('nic/dashboard',[NicController::class,'dashboard']);
		Route::get('nic/exporter',[NicController::class,'index']);
		Route::get('nic/user-list',[NicController::class,'user_list']);

    // //Banner Slider
     Route::get('admin/home-banner',[HomeBannerController::class,'viewBanner'])->name('admin.view_banner');
     Route::get('admin/add-banner',[HomeBannerController::class,'addBanner'])->name('admin.add_banner');
     Route::post('admin/add-process',[HomeBannerController::class,'createBanner'])->name('admin.add_process');
     Route::get('admin/banner/edit-process/{id}',[HomeBannerController::class,'editBanner'])->name('admin.edit_process');
     Route::post('admin/banner/update-process/{id}',[HomeBannerController::class,'updateBanner'])->name('admin.update_process');
     Route::delete('admin/banner/delete/{id}',[HomeBannerController::class,'destroy'])->name('admin.delete_banner');
     Route::get('admin/banner/status/{id}',[HomeBannerController::class,'status'])->name('admin.banner_status');

     Route::get('admin/importer/',[AdminController::class,'importerAdmin'])->name('admin.importers');
     Route::get('admin/exporter/',[AdminController::class,'exporterAdmin'])->name('admin.exporters');
});

    Route::get('imp-exp/reject-exporter',[ExporterController::class,'reject_expoter'])->name('reject_expoter');
    Route::get('imp-exp/pending-exporter',[ExporterController::class,'pending_expoter'])->name('pending_expoter');
    Route::get('imp-exp/exporter',[ExporterController::class,'index'])->name('exporter');
    Route::get('imp-exp/manage_exporter',[ExporterController::class,'manage_exporter']);
    Route::get('imp-exp/manage_exporter/{id}',[ExporterController::class,'manage_exporter']);
    Route::post('imp-exp/manage_exporter_process',[ExporterController::class,'manage_exporter_process'])->name('exporter.manage_exporter_process');
    Route::get('imp-exp/exporter/delete/{id}',[ExporterController::class,'delete']);
    Route::get('imp-exp/exporter/status/{status}/{id}',[ExporterController::class,'status']);
	Route::get('imp-exp/add-exporter',[ExporterController::class,'add'])->name('add.exporter');
	Route::get('imp-exp/download-noc', [ExporterController::class, 'downloadnoc']);
    Route::get('imp-exp/exporter/preview/{id}', [ExporterController::class, 'preview']);
    Route::get('imp-exp/exporter/hscode', [ExporterController::class, 'getHsCodeDataExp'])->name('exp.hs_code');
    // Route::get('imp-exp/exporter/getpdfData', [ExporterController::class, 'getDownloadExpData'])->name('exp.download.form');
    Route::get('imp-exp/exporter/preview_pdf/{id}',[ExporterController::class,'previewExpPdf']);

    Route::get('imp-exp/exporter/draft',[ExporterController::class,'draft'])->name('exporterdraft');
    Route::get('imp-exp/add-exporter/{id}',[ExporterController::class,'draftform']);
    Route::get('imp-exp/exporter/viewDocument/{id}', [ExporterController::class, 'viewDocument']);

    Route::get('imp-exp/add-import',[ImportController::class,'add']);
    Route::get('imp-exp/import',[ImportController::class,'view']);
    Route::post('imp-exp/creates',[ImportController::class,'creates']);
    Route::get('imp-exp/status/{id}', [ImportController::class, 'status']);
    Route::get('imp-exp/edits/{id}', [ImportController::class, 'edits']);
    Route::post('imp-exp/updates/{id}', [ImportController::class, 'updates']);
    Route::get('imp-exp/deletes/{id}', [ImportController::class, 'deletes']);
    Route::get('imp-exp/dashboard',[ImportController::class,'dashboard'])->name('imp-exp.dashboard');
    Route::get('imp-exp/importapi',[ImportController::class,'importapi']);
    //Route::get('imp-exp/preview/{id}', [ImportController::class, 'preview']);
    Route::get('imp-exp/import/preview/{id}', [ImportController::class, 'preview']);
    Route::get('imp-exp/qrcode', [ImportController::class, 'qrcode'])->name('qrcode');

    Route::get('imp-exp/importer/hscode', [ImportController::class, 'getHsCodeData'])->name('imp-exp.hs_code');;

    Route::get('test', [ImportController::class, 'test']);
    
        Route::get('imp-exp/impexpapi',[RegistrationController::class,'impexppi']);
        Route::get('imp-exp/login',[RegistrationController::class,'login_impexp'])->name('imp-exp.login');
        Route::post('imp-exp/impexppi',[RegistrationController::class,'validate_registration'])->name('sample.validate_registration');
        Route::get('/reload-captcha-register',[RegistrationController::class,'reloadCaptchaimportexportReg'])->name('impexp_register.reloadCaptcha');
        Route::get('imp-exp/generate-password',[RegistrationController::class,'generatePassword'])->name('password.generate_password');
        Route::get('imp-exp/thankyou',[RegistrationController::class,'thankyouMessage'])->name('password.thankyou');
        Route::post('save-password',[RegistrationController::class,'createPassword'])->name('password.save-password');
        Route::post('imp-exp/loginimportexport',[RegistrationController::class,'loginimportexport'])->name('imp-exp/loginimportexport');
        Route::get('/reload-captcha2',[RegistrationController::class,'reloadCaptchaExpImp'])->name('impexp_login.reloadCaptcha');
        Route::get('imp-exp/logoutimpexp',[RegistrationController::class,'logoutimpexp'])->name('imp-exp.logoutimpexp');
        Route::get('imp-exp/thankyou-password',[RegistrationController::class,'thankyouPassword'])->name('imp-exp.thankyouPassword');

        Route::get('imp-exp/thankyou-password',[RegistrationController::class,'reloadCaptchaimportexportemailotp'])->name('imp-exp.reloadCaptchaimportexportemailotp');

       // Route::get('imp-exp/change-password', [RegistrationController::class, 'changePassword'])->name('impexp.change-password');
        //Route::post('imp-exp/change-password', [RegistrationController::class, 'updatePassword'])->name('impexp.update-password');

        Route::get('/impexpreload-captcha-forgot',[RegistrationController::class,'reloadCaptchaImpexpForget'])->name('impexp.reloadCaptchaImpexpForget');
        Route::get('imp-exp/forget-password', [RegistrationController::class, 'showForgetPwdForm'])->name('impexp.showForgetPwdForm');
        Route::post('imp-exp/forget-password', [RegistrationController::class, 'submitForgetPassword'])->name('impexp.submitForgetPassword');
        Route::get('imp-exp/forgot-email-message', [RegistrationController::class, 'forgetEmailMessage'])->name('impexp.forgetEmailMessage');
        
        Route::get('/impexpreload-captcha',[RegistrationController::class,'reloadCaptchaImpexpReset'])->name('impexp.reloadCaptchaImpexpReset');
        Route::get('imp-exp/reset-password', [RegistrationController::class, 'showResetPwdForm'])->name('impexp.showResetPwdForm');
        Route::post('imp-exp/reset-password', [RegistrationController::class, 'submitResetPassword'])->name('impexp.submitResetPassword');
        Route::get('imp-exp/reset-message',[RegistrationController::class,'thankyouResetPassword'])->name('imp-exp.thankyouResetPassword');

        Route::get('imp-exp/email-verification', [RegistrationController::class, 'sendEmailVericationFormImpExp'])->name('imp_exp.sendEmailVericationForm');
        Route::post('imp-exp/email-verification', [RegistrationController::class, 'SubmitEmailVericationImpExp'])->name('imp_exp.SubmitEmailVericationIcmr');
    //New Route IMP EXP

	Route::get('imp_exp_sendEmailVericationForm', [RegistrationController::class, 'sendEmailVericationFormImpExp'])->name('imp_exp_sendEmailVericationForm');
    Route::get('imp-exp/registations',[RegistrationController::class,'registrationImpExp'])->name('impexp.registations');
    Route::get('apr-com-officer/registations',[RegistrationController::class,'registrationAprComOff'])->name('apr_com_off.registations');
    Route::get('icmr/qr_noc-exporter/',[NocIssuedController::class,'qrnocShowExpListIcmr']);
    // Route::get('imp-exp/login',[RegistrationController::class,'login'])->name('impexp.login');

    //ICMR

	Route::get('icmr/registations',[RegistrationicmrController::class,'registrationIcmr'])->name('icmr.registations');
    Route::get('icmr/login',[RegistrationicmrController::class,'loginicmr'])->name('icmr.login');
	Route::post('icmr/signin',[RegistrationicmrController::class,'signinicmr'])->name('icmr.validate_login');
    Route::post('icmr/signup',[RegistrationicmrController::class,'validate_icmr'])->name('icmr.validate_registration');
	Route::get('icmr/generate-password',[RegistrationicmrController::class,'generatePasswordicmr'])->name('icmr.generate_passwordicmr');
    Route::get('icmr/thankyou',[RegistrationicmrController::class,'thankyouMessage'])->name('icmr.thankyou');
    Route::post('icmr/save-password',[RegistrationicmrController::class,'createPasswordicmr'])->name('icmr.save-password');
    Route::post('icmr/loginimportexport',[RegistrationicmrController::class,'loginimportexport'])->name('icmr/loginimportexport');
    Route::get('/reload-captcha3',[RegistrationicmrController::class,'reloadCaptchaIcmr'])->name('icmr_login.reloadCaptcha');
    Route::get('icmr/logout',[RegistrationicmrController::class,'logouticmr'])->name('icmr.logout');
    Route::get('icmr/thankyou-password',[RegistrationicmrController::class,'thankyouPasswordIcmr'])->name('icmr.thankyouPassword');

    Route::get('icmr/change-password', [RegistrationicmrController::class, 'changeIcmrPassword'])->name('icmr.icmrchange-password');
    Route::post('icmr/change-password', [RegistrationicmrController::class, 'updateIcmrPassword'])->name('icmr.icmrupdate-password');
    
    Route::get('/icmreload-captcha-forgot',[RegistrationicmrController::class,'reloadCaptchaIcmrForget'])->name('icmr.reloadCaptchaIcmrForget');
    Route::get('icmr/forget-password', [RegistrationicmrController::class, 'icmrshowForgetPwdForm'])->name('icmr.icmrshowForgetPwdForm');
    Route::post('icmr/forget-password', [RegistrationicmrController::class, 'icmrsubmitForgetPassword'])->name('icmr.icmrsubmitForgetPassword');
    Route::get('icmr/forgot-email-message', [RegistrationicmrController::class, 'icmrforgetEmailMessage'])->name('icmr.icmrforgetEmailMessage');

    Route::get('/icmrreload-captcha',[RegistrationController::class,'reloadCaptchaIemrReset'])->name('icmr.reloadCaptchaIemrReset');
    Route::get('icmr/reset-password', [RegistrationicmrController::class, 'icmrShowResetPwdForm'])->name('impexp.icmrshowResetPwdForm');
    Route::post('icmr/reset-password', [RegistrationicmrController::class, 'icmrsubmitResetPassword'])->name('icmr.icmrsubmitResetPassword');
    Route::get('icmr/reset-message',[RegistrationicmrController::class,'icmrThankyouResetPassword'])->name('icmr.icmrthankyouResetPassword');

    Route::get('icmr/reset-message',[RegistrationicmrController::class,'reloadCaptchaIcmrEmailOtp'])->name('icmr_login.reloadCaptchaIcmrEmailOtp');


    Route::get('icmr/dashboard',[ImporticmrController::class,'dashboard'])->name('icmr.dashboard');
	Route::get('icmr/import',[ImporticmrController::class,'view']);
	Route::get('icmr/status/{id}', [ImporticmrController::class, 'status']);
    Route::get('icmr/edits/{id}', [ImporticmrController::class, 'edits']);
    Route::post('icmr/updates/{id}', [ImporticmrController::class, 'updates']);
    Route::get('icmr/deletes/{id}', [ImporticmrController::class, 'deletes']);
    Route::get('icmr/preview/{id}', [ImporticmrController::class, 'previewIcmr'])->name('icmr.previewIcmr');
    Route::get('icmr/assignIcmr/{id}', [ImporticmrController::class, 'assignIcmr'])->name('icmr.assignIcmr');
	Route::get('icmr/commentIcmr/{id}', [ImporticmrController::class, 'comment_Icmr'])->name('icmr.commentIcmr');
	Route::post('icmr/icmrgeneratenoc', [ImporticmrController::class, 'icmr_generate_noc'])->name('icmr.icmr_generate_noc');
    Route::get('icmr/importlist-noc',[ImporticmrController::class,'nocImportListIcmr'])->name('icmr.nocImportListIcmr');
	Route::get('icmr/committee-members/{id}',[ImporticmrController::class,'committeeMembers'])->name('icmr.cometteMenders');
    Route::post('icmr/sendnotification',[ImporticmrController::class,'updateOrInsertNotification'])->name('icmr.sendRemakrNotification');

    Route::get('icmr/reject-export',[ExportericmrController::class,'reject_export'])->name('reject_export');
	Route::get('icmr/assign-committee-export',[ExportericmrController::class,'assign_committee_export'])->name('assign_committee_export');
	Route::get('icmr/exporter',[ExportericmrController::class,'index'])->name('exporter');
	Route::get('icmr/exporter/delete/{id}',[ExportericmrController::class,'delete']);
    Route::get('icmr/exporter/status/{status}/{id}',[ExportericmrController::class,'status']);
    Route::get('icmr/preview-exp/{id}',[ExportericmrController::class,'previewExpIcmr'])->name('icmr.previewExpIcmr');
    Route::get('icmr/exp_json/{id}',[ExportericmrController::class,'exporterjson'])->name('icmr.exporterjson');
    Route::post('icmr/export/send-notification',[ExportericmrController::class,'updateOrInsertSendNotification'])->name('icmr.sendCommentNotification');
	Route::get('icmr/commentsIcmr/{id}', [ExportericmrController::class, 'comments_Icmr'])->name('icmr.commentsIcmr');
	Route::post('icmr/icmrgeneratenocexp', [ExportericmrController::class, 'icmr_generate_nocexp'])->name('icmr.icmr_generate_nocexp');
	Route::get('icmr/exportList-noc',[ExportericmrController::class,'nocExportListIcmr'])->name('icmr.nocExportListIcmr');
    Route::get('icmr/exporter/status/{id}',[ExportericmrController::class,'status_reject']);

    Route::get('icmr/exporter/preview_pdf/{id}',[ExportericmrController::class,'previewExpPdf']);
    Route::get('icmr/exporter/viewDocument/{id}', [ExportericmrController::class, 'viewDocument']);
    

    Route::get('icmr/qr-code',[QrCodeController::class,'qrCodeIcmr']);

    Route::get('icmr/email-verification', [RegistrationicmrController::class, 'sendEmailVericationFormIcmr'])->name('icmr.sendEmailVericationForm');
	
    Route::post('icmr/email-verification', [RegistrationicmrController::class, 'SubmitEmailVericationIcmr'])->name('icmr.SubmitEmailVericationIcmr');

    //NOC Issued
    //ICMR
    Route::get('icmr/noc-importer',[NocIssuedController::class,'nocImpListIcmr'])->name('icmr.noc_importer_list');
    Route::get('icmr/noc-importer/{id}',[NocIssuedController::class,'nocShowImpListIcmr'])->name('icmr.noc_importer_download');
    Route::get('icmr/noc-exporter',[NocIssuedController::class,'nocExpListIcmr'])->name('icmr.noc_exporter_list');
    Route::get('icmr/noc-exporter/{id}',[NocIssuedController::class,'nocShowExpListIcmr'])->name('icmr.noc_exporter_download');

    Route::get('icmr/noc-pdfdata/{id}',[NocIssuedController::class,'getDownloadNocData'])->name('icmr.get_download_noc_data');
   
    Route::get('imp-exp/noc-exporter',[NocIssueController::class,'exporterNocList'])->name('impexp.exporter.noc_list');
    Route::get('imp-exp/noc-exporter/{id}',[NocIssueController::class,'nocExpListPdf'])->name('impexp.exporter.noc_pdf');



//New Route committee Members

	Route::get('committee/registations',[RegistrationicommController::class,'registrationcommittee'])->name('committee.registations');
    Route::get('committee/login',[RegistrationicommController::class,'loginicommittee'])->name('committee.login');
	Route::post('committee/signin',[RegistrationicommController::class,'signincommittee'])->name('committee.validate_login');
    Route::post('committee/signup',[RegistrationicommController::class,'validate_committee'])->name('committee.validate_registration');
	Route::get('reload-captcha4',[RegistrationicommController::class,'reloadCaptchaCommittee'])->name('login.reloadCaptchaCommittee');
    Route::get('committee/generate-password',[RegistrationicommController::class,'generatePasswordcommittee'])->name('committee.generate_passwordicmr');
    Route::get('committee/thankyou',[RegistrationicommController::class,'thankyouMessage'])->name('committee.thankyou');
    Route::post('committee/save-password',[RegistrationicommController::class,'createPasswordcommittee'])->name('committee.save-password');
    Route::post('committee/loginimportexport',[RegistrationicommController::class,'loginimportexport'])->name('committee/loginimportexport');
    Route::get('committee/logout',[RegistrationicommController::class,'logoutcommittee'])->name('committee.logout');
    Route::get('committee/thankyou-password',[RegistrationicommController::class,'thankyouPasswordCommittee'])->name('committee.thankyouPassword');

    Route::get('committee/change-password', [RegistrationicommController::class, 'changeCommiittePassword'])->name('comm.Commiittechange-password');
    Route::post('committee/change-password', [RegistrationicommController::class, 'updateCommiittePassword'])->name('comm.Commiitteupdate-password');

    Route::get('/commreload-captcha-forgot',[RegistrationicommController::class,'reloadCaptchaCommForget'])->name('comm.reloadCaptchaCommForget');

    Route::get('committee/forget-password', [RegistrationicommController::class, 'commShowForgetPwdForm'])->name('comm.commShowForgetPwdForm');
    Route::post('committee/forget-password', [RegistrationicommController::class, 'commSubmitForgetPassword'])->name('comm.commSubmitForgetPassword');
    Route::get('committee/forgot-email-message', [RegistrationicommController::class, 'commforgetEmailMessage'])->name('comm.commforgetEmailMessage');

    Route::get('/commreload-captcha',[RegistrationicommController::class,'reloadCaptchaCommReset'])->name('comm.reloadCaptchaCommReset');

    Route::get('committee/reset-password', [RegistrationicommController::class, 'commShowResetPwdForm'])->name('imcomm.commshowResetPwdForm');
    Route::post('committee/reset-password', [RegistrationicommController::class, 'commSubmitResetPassword'])->name('comm.commsubmitResetPassword');
    Route::get('committee/reset-message',[RegistrationicommController::class,'commThankyouResetPassword'])->name('comm.commthankyouResetPassword');
     
    Route::get('committee/submit_otp_comm', [RegistrationicommController::class, 'submit_otp_comm']);
    Route::post('committee/submit_otp_committee', [RegistrationicommController::class, 'submit_otp_committee']);
    
	
	Route::get('committee/dashboard',[ImportcommController::class,'dashboard'])->name('committee.dashboard');
	Route::get('committee/import',[ImportcommController::class,'view']);
	Route::get('committee/popup/{id}', [ImportcommController::class, 'committepopup']);
    Route::post('committee/feedback', [ImportcommController::class, 'feedback_committee']);
	Route::get('committee/import/preview/{id}', [ImportcommController::class, 'previewcommittee']);

    Route::get('committee/reject-export',[ExportercommController::class,'reject_export'])->name('reject_export');
    Route::get('committee/approve-export',[ExportercommController::class,'approve_export'])->name('approve_export');
	Route::get('committee/exporter',[ExportercommController::class,'index'])->name('exporter');
    Route::get('committee/manage_exporter',[ExportercommController::class,'manage_exporter']);
    Route::get('committee/manage_exporter/{id}',[ExportercommController::class,'manage_exporter']);
    Route::get('committee/download-noc', [ExportercommController::class, 'downloadnoc']);
	Route::get('committee/exporter/preview/{id}', [ExportercommController::class, 'preview_committee']);
	Route::get('committee/exporter/exportjson/{id}', [ExportercommController::class, 'exportjson']);
	Route::post('committee/feedback_committ', [ExportercommController::class, 'feedback_committ']);
    Route::get('committee/viewDocument/{id}', [ExportercommController::class, 'viewDocument']);

	Route::get('committee/noc-importer',[NocIssuedcommController::class,'nocImpListcommittee'])->name('committee.noc_importer_list');
    Route::get('committee/noc-importer/{id}',[NocIssuedcommController::class,'nocShowImpListcommittee'])->name('committee.noc_importer_download');
    Route::get('committee/noc-exporter',[NocIssuedcommController::class,'nocExpListcommittee'])->name('committee.noc_exporter_list');
    Route::get('committee/noc-exporter/{id}',[NocIssuedcommController::class,'nocShowExpListcommittee'])->name('committee.noc_exporter_download');