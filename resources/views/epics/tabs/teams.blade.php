<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">group</span>
                </div>
                <div>
                    <h4>Teams</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .team-horizontal-card{
        box-shadow: 0px 2px 2px 4px rgb(87 106 134 / 20%);
        border-radius: 10px;
        padding: 12px;
        display: flex;
        height: 150px;
    }
    .team-horizontal-card .team-title{
        font-size: 14px;
        color: black;
        font-weight: 600;
    }
    .team-horizontal-card .team-sub-title{
        font-size: 10px;
        color: black;
    }
    .member-profile-team-1{
        display: flex;
        width: 50%;
    }
    .member-profile-team-name{
        margin-left: 10px;
    }
    .member-profile-team-name h4{
        font-size: 12px;
        margin: 3px 0px;
    }
    .member-profile-team-name p{
        font-size: 10px;
    }
    .tittlesection{
        width: 50%;
    }
    .member-profile-team-2{
        display: flex;
        align-items: flex-start;
    }
    .member-profile-team-2 p{
        background-color: #ccc;
        border-radius: 50px;
        padding: 8px;

    }


    .member-profile-team-epics {
        display: flex;
        align-items: flex-start;
    }
    .member-profile-team-epics img{
        width: 15px;
    }
    .member-profile-team-epics {
        font-size: 10px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="team-horizontal-card">
            <div class="row-1">
                <div class="tittlesection">
                    <div class="team-title">
                        Web Design Team
                </div>
                    <div class="team-sub-title">
                        Subtitle goes here lorem ipsum
                    </div>
                </div>
                <div class="member-profile-team-1">
                    <div class="member-profile-team-img">
                        <img src="{{ url('public/assets/svg/teamprofile.png') }}">    
                    </div>
                    <div class="member-profile-team-name">
                        <h4>Jordan Stevenson</h4>
                        <p>Team Leader</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="member-profile-team-2">
                        <img src="{{ url('public/assets/svg/teamprofile.png') }}">
                        <img src="{{ url('public/assets/svg/teamprofile.png') }}">
                        <p>+4</p>
                    </div>
                </div>
            </div>
            <div class="row-2">
                <div class="col-md-3">
                    <div class="member-profile-team-epics">
                        <img src="http://localhost/agileprolific/public/assets/svg/epicheaderheader.svg">
                        <p><strong>40</strong> Total Epics</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="member-profile-team-epics">
                        <img src="http://localhost/agileprolific/public/assets/svg/epicheaderheader.svg">
                        <p><strong>50</strong> Objectives</p>
                    </div>
                </div>
            </div>

            
            
        </div>
    </div>
</div>