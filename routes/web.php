<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes(['verify' => true]);

Route::get('/dashboard/organizations', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\OrganizationController::class, 'indexHome']);

// Route::get('/', function () {
//     return view('welcome');
// });






Route::get('dashboard/organization/report', [App\Http\Controllers\OrganizationController::class,'AllReport']);
Route::get('dashboard/organization/report-2/{id}/{sprint}/{type}', [App\Http\Controllers\OrganizationController::class, 'SecondReport']);




Route::post('save-sprint', [App\Http\Controllers\OrganizationController::class,'saveQuarter']);
Route::post('end-sprint', [App\Http\Controllers\OrganizationController::class,'endQuarter']);
Route::get('dashboard/organization/{id}/BU-Report/{type}', [App\Http\Controllers\OrganizationController::class,'AllBUReport']);
Route::get('Okr-report/{id}/{type}', [App\Http\Controllers\OrganizationController::class,'AllReport']);
Route::get('Okr-report-3/{id}/{type}', [App\Http\Controllers\OrganizationController::class,'ThirdReport']);
Route::get('dashboard/organization/Okr-report-all/{sprint}/{type}', [App\Http\Controllers\OrganizationController::class,'AllEpicReport']);
Route::get('dashboard/organization/report-init/{init}/{sprint}/{type}', [App\Http\Controllers\OrganizationController::class,'AllInitReport']);
Route::get('dashboard/organization/Okr-report-allepic/{sprint}/{type}', [App\Http\Controllers\OrganizationController::class,'AllsprintEpicReport']);
Route::get('dashboard/organization/Okr-report-NC/{sprint}/{type}', [App\Http\Controllers\OrganizationController::class,'NCEpicReport']);
Route::get('dashboard/organization/Okr-report-remove/{sprint}/{type}', [App\Http\Controllers\OrganizationController::class,'RemoveEpicReport']);
Route::post('loadmore', [App\Http\Controllers\OrganizationController::class,'LoadNCEpic']);
Route::post('see-less-epic', [App\Http\Controllers\OrganizationController::class,'LoadLessNCEpic']);

Route::post('update-sprint', [App\Http\Controllers\OrganizationController::class,'UpdateSprintQuarter']);
Route::post('delete-report', [App\Http\Controllers\OrganizationController::class,'DeleteSprintQuarter']);



Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [App\Http\Controllers\GoogleController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [App\Http\Controllers\GoogleController::class, 'handleFacebookCallback']);

Route::get('dashboard/organization/all-organization', [App\Http\Controllers\OrganizationController::class,'Organization']);
Route::post('save-organization', [App\Http\Controllers\OrganizationController::class, 'SaveOrganization']);
Route::post('delete-org', [App\Http\Controllers\OrganizationController::class, 'DeleteOrganization']);
Route::post('update-organization', [App\Http\Controllers\OrganizationController::class, 'UpdateOrganization']);
Route::post('delete-mutiple-organization', [App\Http\Controllers\OrganizationController::class, 'DeleteOrganizationAll']);

Route::get('dashboard/organization/{id}/portfolio/{type}', [App\Http\Controllers\ObjectiveController::class, 'Objectives'])->middleware('auth');
Route::get('get-obj-key-weight', [App\Http\Controllers\ObjectiveController::class, 'AllObjKeyWeight']);


Route::post('save-objective-key', [App\Http\Controllers\ObjectiveController::class, 'SaveKeyObjective']);
Route::post('update-objective-key', [App\Http\Controllers\ObjectiveController::class, 'UpdateKeyObjective']);
Route::post('Delete-objective-key', [App\Http\Controllers\ObjectiveController::class, 'DeleteKeyObjective']);

Route::post('save-key-initiative', [App\Http\Controllers\ObjectiveController::class, 'SaveKeyinitiative']);
Route::post('Delete-key-initiative', [App\Http\Controllers\ObjectiveController::class, 'DeleteKeyInitiative']);
Route::post('update-key-initiative', [App\Http\Controllers\ObjectiveController::class, 'UpdateKeyinitiative']);



Route::post('save-epic', [App\Http\Controllers\ObjectiveController::class, 'SaveEpic']);
Route::get('edit-epic', [App\Http\Controllers\ObjectiveController::class, 'EditEpic'])->middleware('auth');
Route::post('delete-epic', [App\Http\Controllers\ObjectiveController::class, 'DeleteEpic']);
Route::post('update-epic-flag', [App\Http\Controllers\ObjectiveController::class, 'UpdateEpicFlag']);

Route::post('story-check', [App\Http\Controllers\ObjectiveController::class, 'AddStoryProgress']);
Route::post('update-story-check', [App\Http\Controllers\ObjectiveController::class, 'UpdateStoryProgress']);

Route::post('add-story-new', [App\Http\Controllers\ObjectiveController::class, 'AddNewStory']);
Route::post('update-story', [App\Http\Controllers\ObjectiveController::class, 'UpdateStoryTitle']);
Route::post('delete-story', [App\Http\Controllers\ObjectiveController::class, 'DeleteStory']);

Route::post('delete-story-new', [App\Http\Controllers\ObjectiveController::class, 'DeleteNewStory']);
Route::post('update-story-new', [App\Http\Controllers\ObjectiveController::class, 'UpdateNewStory']);

Route::get('get-all-data', [App\Http\Controllers\ObjectiveController::class, 'GetAllData']);

Route::get('check-key-weight', [App\Http\Controllers\ObjectiveController::class, 'checkkeyweight']);
Route::get('check-key-weight-edit', [App\Http\Controllers\ObjectiveController::class, 'checkkeyweightedit']);
Route::get('check-key-weight-edit-first', [App\Http\Controllers\ObjectiveController::class, 'checkkeyweighteditfirst']);

Route::post('change-epic-month', [App\Http\Controllers\ObjectiveController::class, 'ChangeEpic']);

Route::get('weight-check-edit', [App\Http\Controllers\ObjectiveController::class, 'WeightCheckEdit']);

Route::get('check-initiative-weight', [App\Http\Controllers\ObjectiveController::class, 'checkinitiativeweight']);
Route::get('weight-initiative-edit', [App\Http\Controllers\ObjectiveController::class, 'WeightCheckinitiativeEdit']);
Route::get('check-init-weight-edit', [App\Http\Controllers\ObjectiveController::class, 'checkinitiativeweightedit']);
Route::get('check-init-weight-edit-first', [App\Http\Controllers\ObjectiveController::class, 'checkinitiativeweighteditfirst']);
Route::get('get-epic-team', [App\Http\Controllers\ObjectiveController::class, 'EpicTeam']);
Route::get('Get-Epic-Flag', [App\Http\Controllers\ObjectiveController::class, 'GetEpicFlag']);

Route::get('chart', [App\Http\Controllers\ChartController::class, 'ChartData']);
Route::post('save-chart-data', [App\Http\Controllers\ChartController::class,'fileImport']);
Route::get('chart-data', [App\Http\Controllers\ChartController::class, 'ChartCsv']);
Route::get('edit-chart', [App\Http\Controllers\ChartController::class, 'EditChart']);
Route::post('update-chart', [App\Http\Controllers\ChartController::class,'UpdateChart']);
Route::post('add-chart-new', [App\Http\Controllers\ChartController::class,'AddNewChart']);
Route::post('delete-chart', [App\Http\Controllers\ChartController::class,'DeleteChart']);
Route::get('edit-chart-basic', [App\Http\Controllers\ChartController::class, 'EditBasicChart']);
Route::post('update-chart-basic', [App\Http\Controllers\ChartController::class, 'UpdateBasicChart']);
Route::post('delete-graph-val', [App\Http\Controllers\ChartController::class, 'Deletegraphval']);
Route::get('download/{file_name}', [App\Http\Controllers\ChartController::class, 'getDownload']);
Route::get('get-chart-status', [App\Http\Controllers\ChartController::class, 'ChartFilter']);
Route::get('chart-status', [App\Http\Controllers\ChartController::class, 'GetChartStatus']);

// Members


Route::get('dashboard/organization/users', [App\Http\Controllers\MemberController::class,'AllMembers']);
Route::post('save-member', [App\Http\Controllers\MemberController::class,'SaveMember']);
Route::post('edit-member', [App\Http\Controllers\MemberController::class,'UpdateMember']);
Route::get('check-email', [App\Http\Controllers\MemberController::class,'Checkemail']);
Route::post('delete-member', [App\Http\Controllers\MemberController::class,'DeleteMember']);
Route::post('delete-mutiple-user', [App\Http\Controllers\MemberController::class,'DeleteAllMember']);
Route::get('check-email-edit', [App\Http\Controllers\MemberController::class,'CheckemailEdit']);

Route::get('dashboard/organization/contacts', [App\Http\Controllers\MemberController::class,'ObjectivesContacts']);
Route::post('save-org-contact', [App\Http\Controllers\MemberController::class,'SaveOrganizationMember']);
Route::post('update-org-contact', [App\Http\Controllers\MemberController::class,'UpdateOrganizationMember']);
Route::post('delete-org-contact', [App\Http\Controllers\MemberController::class,'DeleteOrganizationMember']);
Route::post('delete-mutiple-organization-contact', [App\Http\Controllers\MemberController::class,'MultipleDeleteOrganizationMember']);
Route::get('dashboard/organization/{slug}/Value-Streams/dashboard', [App\Http\Controllers\MemberController::class,'VUDashboard']);

//BusinessUnits
Route::get('dashboard/organization/Business-Units', [App\Http\Controllers\MemberController::class,'ObjectivesUnit']);
Route::get('dashboard/organization/{id}/dashboard/{type}', [App\Http\Controllers\MemberController::class,'BUDashboard']);

Route::post('add-business-unit', [App\Http\Controllers\MemberController::class,'SaveBusinessUnits']);
Route::post('add-team-unit', [App\Http\Controllers\MemberController::class,'SaveBusinessTeam']);
Route::get('dashboard/organization/{id}/BU-TEAMS', [App\Http\Controllers\MemberController::class,'ObjectivesUnitTeam']);
Route::get('dashboard/organization/{id}/BU-Backlog', [App\Http\Controllers\MemberController::class,'UnitBacklog']);
Route::post('add-unitbacklog-epic', [App\Http\Controllers\MemberController::class,'SaveUnitBacklogEpic']);
Route::post('update-unitbacklog-epic', [App\Http\Controllers\MemberController::class,'UpdateUnitBacklogEpic']);
Route::post('assign-unitbacklog-epic', [App\Http\Controllers\MemberController::class,'AssignUnitBacklogEpic']);
Route::post('update-team-unit', [App\Http\Controllers\MemberController::class,'UpdateBusinessTeam']);
Route::get('get-assign-epic-unit', [App\Http\Controllers\MemberController::class,'AssignEpicBacklog']);
Route::post('delete-unit-team', [App\Http\Controllers\MemberController::class,'DeleteBusinessTeam']);
Route::post('update-business-unit', [App\Http\Controllers\MemberController::class,'UpdateBusinessUnits']);
Route::post('delete-business-unit', [App\Http\Controllers\MemberController::class,'DeleteBusinessUnits']);
Route::post('delete-unit-backlog', [App\Http\Controllers\MemberController::class,'DeleteUnitBacklogEpic']);


Route::get('dashboard/organization/{id}/Value-Streams', [App\Http\Controllers\MemberController::class,'ObjectivesValue']);
Route::post('add-value-stream', [App\Http\Controllers\MemberController::class,'SaveBusinessStream']);
Route::post('add-stream-team', [App\Http\Controllers\MemberController::class,'SaveStreamTeam']);
Route::post('update-stream-team', [App\Http\Controllers\MemberController::class,'UpdateStreamTeam']);
Route::post('delete-value-team', [App\Http\Controllers\MemberController::class,'DeleteValueTeam']);
Route::post('update-value-stream', [App\Http\Controllers\MemberController::class,'UpdateBusinessStream']);
Route::post('delete-value-stream', [App\Http\Controllers\MemberController::class,'DeleteValueStream']);
Route::get('get-user', [App\Http\Controllers\MemberController::class,'SearchMember']);


Route::get('objectives-team/{id}', [App\Http\Controllers\MemberController::class,'ObjectivesTeam']);
Route::post('add-team-global', [App\Http\Controllers\MemberController::class,'SaveGlobTeam']);

Route::get('dashboard/organization/{id}/VS-Backlog', [App\Http\Controllers\MemberController::class,'StreamBacklog']);
Route::post('add-backlog-epic', [App\Http\Controllers\MemberController::class,'SaveBacklogEpic']);
Route::get('get-value-obj', [App\Http\Controllers\MemberController::class,'GetBacklogObj']);
Route::get('get-value-key', [App\Http\Controllers\MemberController::class,'GetBacklogKey']);
Route::get('get-value-init', [App\Http\Controllers\MemberController::class,'GetBacklogInit']);


Route::post('delete-stream-backlog', [App\Http\Controllers\MemberController::class,'DeleteStreamBacklogEpic']);

Route::post('assign-backlog-epic',[App\Http\Controllers\MemberController::class,'AssignBacklogEpic']);
Route::get('dashboard/organization/{id}/performance-dashboard/{type}', [App\Http\Controllers\MemberController::class,'ValueChart']);
Route::get('dashboard/organization/{id}/VS-TEAMS', [App\Http\Controllers\MemberController::class,'ObjectivesValueTeam']);
Route::get('get-assign-epic', [App\Http\Controllers\MemberController::class,'AssignEpic']);

Route::post('change-backlog-pos', [App\Http\Controllers\MemberController::class,'UpdatePosBacklogEpic']);
Route::get('dashboard/organization/Bu/dashboard', [App\Http\Controllers\MemberController::class,'BUDashboard']);


Route::get('get-jira-epic', [App\Http\Controllers\JiraController::class,'jira']);
Route::post('assign-jira-epic', [App\Http\Controllers\JiraController::class,'AssignJiraEpic']);
Route::get('dashboard/organization/setting', [App\Http\Controllers\JiraController::class,'JiraSetting']);
Route::get('dashboard/organization/financialsetting', [App\Http\Controllers\JiraController::class,'financialsettings']); 
Route::post('add-jira-setting', [App\Http\Controllers\JiraController::class,'AddJiraSetting']);
Route::post('add-financial-year', [App\Http\Controllers\JiraController::class,'AddFinancialYear']);
Route::post('update-jira-setting', [App\Http\Controllers\JiraController::class,'UpdateJiraSetting']);
Route::post('delete-jira-account', [App\Http\Controllers\JiraController::class,'DeleteJiraSetting']);
Route::get('get-jira-project', [App\Http\Controllers\JiraController::class,'JiraProject']);

Route::get('get-month', [App\Http\Controllers\MemberController::class,'GetMonth']);
Route::get('Updatejira', [App\Http\Controllers\JiraController::class,'UpdateBujira']);
Route::post('assign-teambacklog-epic', [App\Http\Controllers\TeamController::class,'AssignTeamBacklogEpic']);
Route::post('update-teambacklog-epic', [App\Http\Controllers\TeamController::class,'UpdateTeamBacklogEpic']);
Route::post('delete-team-backlog', [App\Http\Controllers\TeamController::class,'DeleteTeamBacklogEpic']);
Route::get('get-assign-epic-all', [App\Http\Controllers\TeamController::class,'AssignEpicAll']);

Route::name('objectives.')->namespace('App\Http\Controllers')->prefix('dashboard/objectives')->group(function () {
    Route::POST('getobjective', 'ObjectiveController@getobjective');
    Route::POST('showobjectiveheader', 'ObjectiveController@showobjectiveheader');
    Route::POST('updategeneral', 'ObjectiveController@updategeneral');
    Route::POST('showtabobjective', 'ObjectiveController@showtabobjective');
    Route::POST('addnewobjective', 'ObjectiveController@addnewobjective');
    Route::POST('deleteobjective', 'ObjectiveController@deleteobjective');
    Route::POST('changeobjectivestatus', 'ObjectiveController@changeobjectivestatus');
    
});

Route::name('flags.')->namespace('App\Http\Controllers')->prefix('dashboard/flags')->group(function () {
    Route::get('{organizationid}/{flagtype}/{type}', 'FlagController@flags');
    Route::POST('change-flag-status', 'FlagController@changestatus');
    Route::POST('getflagmodal', 'FlagController@getflagmodal');
    Route::POST('updateflag', 'FlagController@updateflag');
    Route::POST('savecomment', 'FlagController@savecomment');
    Route::POST('deletecomment', 'FlagController@deletecomment');
    Route::POST('updatecomment', 'FlagController@updatecomment');
    Route::POST('orderbycomment', 'FlagController@orderbycomment');
    Route::POST('deleteflag', 'FlagController@deleteflag');
    Route::POST('savereply', 'FlagController@savereply');
    Route::POST('searchflag', 'FlagController@searchflag');
    Route::POST('createimpediment', 'FlagController@createimpediment');
    Route::POST('getepicflag', 'FlagController@getepicflag');
    Route::POST('updateepicflag', 'FlagController@updateepicflag');
    Route::POST('viewboards', 'FlagController@viewboards');
    Route::POST('archiveflag', 'FlagController@archiveflag');
    Route::POST('unarchiveflag', 'FlagController@unarchiveflag');
    Route::POST('showepicdetail', 'FlagController@showepicdetail');
    Route::POST('escalateflag', 'FlagController@escalateflag');
    Route::POST('showtab', 'FlagController@showtab');
    Route::POST('uploadattachment', 'FlagController@uploadattachment');
    Route::POST('deleteattachment', 'FlagController@deleteattachment');
    Route::POST('savemember', 'FlagController@savemember'); 
    Route::POST('showorderby', 'FlagController@showorderby');  
    Route::POST('searchmember', 'FlagController@searchmember');
    Route::POST('removeepic', 'FlagController@removeepic');
    Route::POST('searchepic', 'FlagController@searchepic');
    Route::POST('selectepic', 'FlagController@selectepic');
    Route::POST('moveflag', 'FlagController@moveflag');
    Route::POST('modalheader', 'FlagController@modalheader');
    Route::POST('sortflags', 'FlagController@sortflags');
    Route::POST('filterbyextension', 'FlagController@filterbyextension');
    Route::POST('removefromflag', 'FlagController@removefromflag');
    Route::POST('filterbyasignee', 'FlagController@filterbyasignee');
    
});
Route::name('linking.')->namespace('App\Http\Controllers')->prefix('dashboard')->group(function () {
    
    Route::get('mapper/{url}/{type}', 'MapperController@mapperbytype');
    Route::get('okr-mapper', 'MapperController@index');
    Route::POST('linking/saveteamlevellinking', 'MapperController@saveteamlevellinking');
    Route::POST('linking/checkkeyresultmapper', 'MapperController@checkkeyresultmapper');
    Route::POST('linking/getorganizationkeyresult', 'MapperController@getorganizationkeyresult');
    
});

Route::name('epicbacklog.')->namespace('App\Http\Controllers')->prefix('dashboard/epicbacklog')->group(function () {
    Route::get('{id}/{type}', 'EpicBacklogController@index');
    Route::POST('getepic', 'EpicBacklogController@getepicmodal');
    Route::POST('showheader', 'EpicBacklogController@showheader');
    Route::POST('showtab', 'EpicBacklogController@showtab');
    Route::POST('uploadattachment', 'EpicBacklogController@uploadattachment');
    Route::POST('deleteattachment', 'EpicBacklogController@deleteattachment');
    Route::post('updategeneral', 'EpicBacklogController@updategeneral');
    Route::POST('changeepicdate', 'EpicBacklogController@changeepicdate');
    Route::POST('changeepicstatus', 'EpicBacklogController@changeepicstatus');
    Route::POST('addnewbacklogepic', 'EpicBacklogController@addnewbacklogepic');
    Route::POST('selectteamforepic', 'EpicBacklogController@selectteamforepic');
    Route::post('createchilditem', 'EpicBacklogController@createchilditem');
    Route::POST('savecomment', 'EpicBacklogController@savecomment');
    Route::POST('savereply', 'EpicBacklogController@savereply');
    Route::POST('updatecomment', 'EpicBacklogController@updatecomment');
    Route::POST('deletecomment', 'EpicBacklogController@deletecomment');
    Route::POST('saveepicflag', 'EpicBacklogController@saveepicflag');
    Route::POST('updateflagstatus', 'EpicBacklogController@updateflagstatus');
    Route::POST('flagupdate', 'EpicBacklogController@flagupdate');       
    Route::POST('showdataintable', 'EpicBacklogController@showdataintable');
    Route::get('clone/{id}/{type}', 'EpicBacklogController@cloneepic');
    Route::POST('updatechlditem', 'EpicBacklogController@updatechlditem');
    Route::POST('changeitemstatus', 'EpicBacklogController@changeitemstatus');
    Route::POST('deletechilditem', 'EpicBacklogController@deletechilditem');
    Route::POST('orderbychilditembacklog', 'EpicBacklogController@orderbychilditembacklog');
});



Route::name('epics.')->namespace('App\Http\Controllers')->prefix('dashboard/epics')->group(function () {
    Route::POST('getepic', 'EpicController@getepicmodal');
    Route::POST('updategeneral', 'EpicController@updategeneral');
    Route::POST('showepicinboard', 'EpicController@showepicinboard');
    Route::POST('showtab', 'EpicController@showtab');
    Route::POST('uploadattachment', 'EpicController@uploadattachment');
    Route::POST('deleteattachment', 'EpicController@deleteattachment');
    Route::post('createchilditem', 'EpicController@createchilditem');
    Route::POST('savecomment', 'EpicController@savecomment');
    Route::POST('deletecomment', 'EpicController@deletecomment');
    Route::POST('updatecomment', 'EpicController@updatecomment');
    Route::POST('orderbycomment', 'EpicController@orderbycomment');
    Route::POST('savereply', 'EpicController@savereply');
    Route::POST('changeepicstatus', 'EpicController@changeepicstatus');
    Route::POST('showheader', 'EpicController@showheader');
    Route::POST('updateflagstatus', 'EpicController@updateflagstatus');
    Route::POST('flagupdate', 'EpicController@flagupdate');   
    Route::POST('deletechilditem', 'EpicController@deletechilditem');
    Route::POST('orderbychilditem', 'EpicController@orderbychilditem');
    Route::POST('changeepicdate', 'EpicController@changeepicdate');  
    Route::POST('sortchilditem', 'EpicController@sortchilditem'); 
    Route::POST('bulkupdate', 'EpicController@bulkupdate'); 
    Route::POST('selectteamforepic', 'EpicController@selectteamforepic'); 
    Route::POST('sortflags', 'EpicController@sortflags');
    Route::POST('showorderbyactivity', 'EpicController@showorderbyactivity');
    Route::POST('showorderby', 'EpicController@showorderby');
    Route::POST('savenewepic', 'EpicController@savenewepic');
    Route::POST('showlatestepicdatainmodal', 'EpicController@showlatestepicdatainmodal');
    Route::POST('saveepicflag', 'EpicController@saveepicflag');    
    Route::POST('removeteamfromepic', 'EpicController@removeteamfromepic');
    Route::POST('showepicincard', 'EpicController@showepicincard');
    
});

Route::name('keyresult.')->namespace('App\Http\Controllers')->prefix('dashboard/keyresult')->group(function () {
    Route::POST('getkeyresult', 'KeyresultController@getkeyresult');
    Route::POST('updategeneral', 'KeyresultController@updategeneral');
    Route::POST('showheader', 'KeyresultController@showheader');
    Route::POST('showtab', 'KeyresultController@showtab');
    Route::POST('updatetarget', 'KeyresultController@updatetarget');
    Route::POST('addquartervalue', 'KeyresultController@addquartervalue')->name('addquartervalue');
    Route::POST('deletequartervalue', 'KeyresultController@deletequartervalue')->name('deletequartervalue');
    Route::POST('createkeyresult', 'KeyresultController@createkeyresult');
    Route::POST('changekeyresultstatus', 'KeyresultController@changekeyresultstatus');
    Route::POST('removeweight', 'KeyresultController@removeweight');
    Route::POST('addweight', 'KeyresultController@addweight');
    Route::POST('selectteamokrmapper', 'KeyresultController@selectteamokrmapper');
    Route::POST('okrmapperform', 'KeyresultController@okrmapperform');
    Route::POST('checkkeyresultlink', 'KeyresultController@checkkeyresultlink');
    Route::POST('deletelinking', 'KeyresultController@deletelinking');
    Route::POST('searchobjectives', 'KeyresultController@searchobjectives');
    Route::POST('selectobjective', 'KeyresultController@selectobjective');


});



//EpicComment
Route::post('add-epic-comment', [App\Http\Controllers\ObjectiveController::class, 'SaveComment']);
Route::post('update-epic-comment', [App\Http\Controllers\ObjectiveController::class, 'UpdateEpicComment']);
Route::get('get-epic-comment', [App\Http\Controllers\ObjectiveController::class, 'GetEpicComment']);
Route::post('save-edit-epic-comment', [App\Http\Controllers\ObjectiveController::class, 'SaveEditComment']);
Route::post('delete-epic-comment', [App\Http\Controllers\ObjectiveController::class, 'DeleteEpicComment']);
Route::post('epic-reply-edit', [App\Http\Controllers\ObjectiveController::class, 'EpicCommentReply']);
//keyChart
Route::get('get-key-chart', [App\Http\Controllers\OrganizationController::class, 'GetKeychart']);
Route::post('add-new-quarter-value', [App\Http\Controllers\OrganizationController::class, 'AddnewQvalue']);
Route::post('update-new-quarter-value', [App\Http\Controllers\OrganizationController::class, 'UpdateQvalue']);
Route::post('delete-new-quarter-value', [App\Http\Controllers\OrganizationController::class, 'DeleteQvalue']);
Route::post('update-key-quarter-value', [App\Http\Controllers\OrganizationController::class, 'UpdateQkeyVal']);
Route::post('add-key-quarter-value', [App\Http\Controllers\OrganizationController::class, 'AddnewKeyQvalue']);

Route::get('get-team', [App\Http\Controllers\TeamController::class,'GetTeam']);
Route::get('get-team-obj', [App\Http\Controllers\TeamController::class,'GetTeamObj']);
Route::get('get-unit-obj', [App\Http\Controllers\TeamController::class,'GetBUObj']);
Route::get('get-BU-key', [App\Http\Controllers\TeamController::class,'GetBUKey']);
Route::get('append-team', [App\Http\Controllers\TeamController::class,'AppendTeam']);
Route::get('append-bu', [App\Http\Controllers\TeamController::class,'AppendBU']);
Route::get('get-key-link', [App\Http\Controllers\TeamController::class,'GetTeamLink']);
Route::post('delete-key-link', [App\Http\Controllers\TeamController::class,'DeleteTeamLink']);
Route::get('get-obj-link', [App\Http\Controllers\TeamController::class,'GetValueLink']);
Route::post('delete-obj-link', [App\Http\Controllers\TeamController::class,'DeleteTeamLinkObj']);
Route::get('search-epic-team', [App\Http\Controllers\TeamController::class,'EpicTeamSearch']);

Route::get('dashboard/organization/{slug}/Unit-Team/dashboard', [App\Http\Controllers\TeamController::class,'BUTeamDashboard']);
Route::get('dashboard/organization/{slug}/Unit-Team/dashboard', [App\Http\Controllers\TeamController::class,'BUTeamDashboard']);

Route::get('dashboard/organization/{id}/Org-TEAMS', [App\Http\Controllers\OrganizationController::class,'OrgTeam']);
Route::post('add-team-org', [App\Http\Controllers\OrganizationController::class,'SaveOrgTeam']);
Route::post('update-team-org', [App\Http\Controllers\OrganizationController::class,'UpdateOrgTeam']);
Route::post('delete-org-team', [App\Http\Controllers\OrganizationController::class,'DeleteOrgTeam']);

// PROFILE
Route::get('change-password', [App\Http\Controllers\OrganizationController::class,'change_password']);
Route::post('update-password', [App\Http\Controllers\OrganizationController::class,'update_password']);
Route::get('profile-setting', [App\Http\Controllers\OrganizationController::class,'profile']);
Route::post('update-profile', [App\Http\Controllers\OrganizationController::class,'UpdateProfile']);

Route::post('change-init-pos', [App\Http\Controllers\ObjectiveController::class,'UpdatePosInit']);





