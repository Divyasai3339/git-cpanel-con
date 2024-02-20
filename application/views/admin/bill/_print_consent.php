<?php 
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/sh-print.css">
<style>
   /* ul li {
        list-style: none;

    } */
    body{
        line-height: 2;
    }
    ol li{
        text-align: justify;
    }
    .box_type{
        height: auto;
        padding: 10px; 
        border: 10px solid rgb(168, 179, 181);
        border-radius: 25px;
        background: #ffffff;
     }
     .box_type{
        font-size: 13px;
        width:450px;
     }
     .span_rt
     {
        float: right;justify-content: ;text-align: ;
     }
     .span_lt{
        float: left;justify-content: ;text-align: ;
     }
     .col-md-4>h2{
        text-align: center;
     }
     .col-sm-6{
         width:1000px !important;
         position:relative;
     }
     .svg1{
         /*width:60px;*/
         /*height:40px;*/
         position:absolute;
         left:47%;
         top:18%;
         z-index:10;
     }
          .svg2{
         /*width:60px;*/
         /*height:40px;*/
         position:absolute;
         left:47%;
         top:54%;
         z-index:10;
         rotate: 180deg;
     }


  </style>
<div class="container">

<svg xmlns="http://www.w3.org/2000/svg" class="svg1" width="60" height="20" viewBox="0 0 50 24" fill="blue" stroke="#2500ff" stroke-width="3" stroke-linecap="butt" stroke-linejoin="round"><polygon points="5 3 40 12 5 21 5 3"/></svg>


<svg xmlns="http://www.w3.org/2000/svg" class="svg2" width="60" height="20" viewBox="0 0 50 24" fill="blue" stroke="#2500ff" stroke-width="3" stroke-linecap="butt" stroke-linejoin="round"><polygon points="5 3 40 12 5 21 5 3"/></svg>



        <div class="row" style="display:flex;">
            <div class="col-sm-6" style="padding-right:15px;">
                    <h2>SIGN IN</h2>
                    <div class="box_type">
                            <h4 class="">Before Giving Anesthetic</h4>
                                <div type="disc">
                                    Has the Patient confirmed his/her Identity, site, procedure and consent ?
                                      <span  class="span_rt">
                                        <input type="checkbox" id="confirm" name="confirm" value="confirm"> <b>Yes</b> 
                                      </span>
                                </div>
                                <div>
                                    Is the surgical site marked ? 
                                    <span  class="span_rt">
                                        <input type="checkbox" id="sitemarked" name="sitemarked" value="yes"> <b>Yes</b> 
                                      </span>
                                </div>
                                <div>
                                    Does the Patient have a
                                    <br> Known Allergy
                                      <span  class="span_rt">
                                        <input type="checkbox" id="knownallergy" name="knownallergy" value="yes"> <b class="margin-top: -10px;">Yes</b> 
                                        <input type="checkbox" id="knownallergy" name="knownallergy" value="no"> <b class="margin-top: -10px;">No</b>
                                      </span>

                                </div>
                                <div>
                                    Difficult Airway/Aspiration risk
                                    <span  class="span_rt">
                                        <input type="checkbox" id="airway_aspiration" name="airway_aspiration" value="yes"> <b class="margin-top: -10px;">Yes</b> 
                                        <input type="checkbox" id="airway_aspiration" name="airway_aspiration" value="no"> <b class="margin-top: -10px;">No</b>
                                      </span>

                                </div>
                                <div>
                                    Any Special requirements for 
                                    <br> positioning/draping
                                    <span  class="span_rt">
                                        <input type="checkbox" id="positioning_draping" name="positioning_draping" value="yes"> <b class="margin-top: -10px;">Yes</b> 
                                        <input type="checkbox" id="positioning_draping" name="positioning_draping" value="no"> <b class="margin-top: -10px;">No</b>
                                      </span>

                                </div>
                                <div>
                                    Is the Patient taking <br>
                                     Blood thinners
                                    <span  class="span_rt">
                                        <input type="checkbox" id="blood_thinners" name="blood_thinners" value="yes"> <b class="margin-top: -10px;">Yes</b> 
                                        <input type="checkbox" id="blood_thinners" name="blood_thinners" value="no"> <b class="margin-top: -10px;">No</b>
                                      </span>

                                </div>
                                <div>
                                    Is the Patient taking Tamsulosin / Aplha Blocker 
                                    <span class="span_rt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes"> <b class="margin-top: -10px;">Yes</b> 
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="no"> <b class="margin-top: -10px;">No</b>
                                      </span>
                                </div>
                    </div>
                    
                    <!--<hr>-->
                    
                     <h2>SIGN OUT</h2>
                    <div class="box_type"">
                        <h4 class="">Before any member of the team leaves the Operating Room</h4>
                     
                        <div>
                            Surgeon/Scrub Assistant Verbally confirms: 
                            <br> 
                            <span class="span_lt">
                                <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                              </span>&nbsp;
                            Has the name and side of surgery been recorded?
                            <br>

                            <span class="span_lt">
                                <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                              </span>&nbsp;
                            Have equipment problems been identified that need to be addressed <br>
                            <span class="span_lt">
                                <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                              </span>&nbsp;
                             Any Variations in standard recovery and discharge protocols for this patient
                           
                        </div>  
                      
                    
                        </div>
                    </div>
                       <!--<br>-->

                    <div class="col-sm-6" style="padding-left:15px;">
                        <h2>TIME OUT</h2>
                        <div class="box_type"">
                            <h4 class="">Before Giving Anesthetic</h4>
                            <div type="disc">
                                <div>
                                    Have all team members introduced themselves by name and role?
                                      <span class="span_rt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes"> <b class="margin-top: -10px;">Yes</b> 
                                      </span>
                                </divdiv>
                                <div>
                                    Surgeon, Scrub assistant verbally confirm: <br>
                                    <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;
                                    Patient's Name <br>
                                    <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;
                                    Procedure and Eye to be operated <br>
                                    <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;
                                    Planned Refractive Outcome <br>
                                    <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;
                                    Lens Model and Power to be used ? <br>
                                    <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;

                                    Is the correct Lens Implant  available <br>
                                   
                                </div>
                                <div>
                                    Anticipated Critical Events
                                    <br>
                                    Surgeon:
                                    <br>
                                       <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;
                                       Are there any special equipment required?
                                     <br>
                                     <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;

                                     Are any variations to standard procedure planned or expected?
                                     <br>
                                     <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;
                                       Is an alternate lens Implant available, if needed?
                                     <br>
                                     Anesthetist:
                                    <br>
                                    <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;
                                     Are there any patient specific concerns
                                     <br>
                                     <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;

                                     Any Special monitoring requirements 
                                     <br>
                                     Scrub assistant:
                                    <br>
                                    <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;

                                    Has Sterility of Instruments been confirmed
                                    <br>
                                    <span class="span_lt">
                                        <input type="checkbox" id="Tamsulosin" name="Tamsulosin" value="yes">  
                                      </span>&nbsp;
                                       Are there any equipment issues  or  concerns 
                                 

                                </div>
                                
                            </div>
                        </div>
            </div>
        </div>
      
        
      
    </div>
  
   <br>
    <hr>
        <div class="col-md-12">
                <div class="row text-left">
                    <div class="col-md-6">
                        Signature:
                        <br>
                        Name:
                        <br>
                        Signature:
                        
                     
                    </div>
                    <div class="col-md-6">
                    Surgeon Name:  <?php echo $result1['surgeon_name'] ;?>
                        <br>
                        Date:    <?php echo $result1['surgery_date'] ;?>
                        <br>
                        KMC No:   <?php echo $result1['kmc_no'] ;?>
                    </div>
                </div>
            </div>
  
          <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  
  
  
  
    <!--<div class="container">-->
    <!--    <div class="row">-->
 
           <div class="col-md-12" style="margin-top:180px;">
            <div class="row">
                <div class="col-md-4">
                    <h5>DESH/IPD/27</h5>
                    <h1>pic</h1>
                </div>
                <div class="col-md-4" class="text-center">
                  
                        <div>
                            logo NABH
                        </div>
                
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-12">191/1,2nd Cross, Link Road, <br/> Malleshwaram, Bangalore-560003 <br/> Phone No: 080-23562211/23562299</div> 
        
                    </div>
                </div>
            </div>
           </div>
           <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center"><b> Consent for Cataract Surgery with/without Implantation of Intraocular Lens (IOL)</b></h4>
                </div>
                <div class="col-md-12">
                <h4>
                    Name of the Patient :  <?php echo composePatientName($result1['patient_name'],$result1['patient_id']);?> Patient ID :  <?php echo '('.$result1['patient_id'] .')'; ?>
                    <br>
                    <?php 
                    $nows = date('Y-m-d');
                    ?>
                    Date :  <?php echo $result1['surgery_date'] ;?>     </br>
                    
                    Age/Sex : <?php echo $result1['age'] .'/'.$result1['gender'] ;?> </br>
                     Son/Daughter/Wife of <?php echo $result1['guardian_name'] ;?>  <br/>
                    Address : <?php echo $result1['address'] ;?>
                    <br/>
                   Tel no : <?php echo $result1['mobileno'] ;?>
                    </h4>

                    <p>
                        <b class="weight:600;">Introduction:</b> <br><br>
                        Cataract is the opacification of the natural crystalline lens. Cataract operation is indicated only when you cannot function adequately due to poor sight and glare produced by it. Maturity of cataract is no longer the only criterion for surgery. The natural lens within your eye with a slight cataract, although not perfect, has distinct advantages over an artificial lens. In giving permission for cataract extraction with/ without implantation of an intraocular lens in my eye, I declare that I understand the following information:
                        <br>
                        <ol>
                            <li class="1">
                                Alternative treatments: <br>

                                There are three methods of restoring vision after cataract surgery <br>
        
                                a) Cataract Spectacles  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
                                b) Contact Lens   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
                                c) Intraocular Lens   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                                Cataract spectacles increase image size by 30%. They cannot be used if there is cataract in only one eye (the other is normal because they may cause double vision. A contact lens increases image size by 8%. However, it is difficult to handle and may not be tolerated by everyone. Intraocular lens does not increase image size. It is surgically placed inside the eye permanently.

                            </li>
                            <li>
                                An Intraocular lens is impanted by surgery (not by laser). The implanted lens will be left in the eye permanently. At the time of surgery, the doctor may decide not to implant an intraocular lens in the eye, if for any reason he feels that the lens implantation is not indicated or may prove deleterious to the well-being of the eye, even though permission may have been given to do so.
                            </li>
                            <li>
                                Though the intraocular implant power is calculated by utilizing a computerised biometer (A-scan), a small in the spectacles is to be considered inevitable postoperatively and this may be more in specific cases. An astigmatism (number with axis) which may reduce with time is to be taken as inevitable and normal. Therefore, a small power is to be expected in the spectacles for distance and near for clear vision after the operation. In any case, the aim of cataract surgery is to remove the cloudy lens from the eye and replace it with an artificial lens and not to rid the patient of his spectacles.
                            </li>
                            <li>
                                The quality of vision obtained after a successful cataract surgery/lens implantation depends upon the health status of retina behind. In an advanced cataract even with the most sophisticated instruments (Ultrasound Scan etc.), it is not possible to it ascertain the health status of retina. If the health of the retina is normal, you will see well. But with asubnormal retinal health status the visual recovery post cataract surgery will be proportionateto it
                            </li>
                            <li>
                                With modern instrumentation and micro surgical techniques, the rate of complications in cataract surgery with/without intraocular lens implantation is very low. Complications can usually be managed medically and/or surgically. The chances of total loss of vision are less then 0.5%. However, the following complications can occur and are mentioned in standard text books of cataract.and lens implantation surgery:
                                <ol type="a">
                                    <li>
                                    Complications may include, posterior capsule rupture, nucleus drop, vitreous loss, wound leakage, uveitis, corneal decompensation, glaucoma, cystoid macular oedema, retinal detachment, irregular pupil, droopy eyelid and rarely sudden bleeding inside the eye (explusive haemorrhage) leading to impairment of vision and eye
                                    </li>
                                    <li>
                                        b) Intraocular lens implantation gives good vision but occasionally you may experience optical problems (like glare, haloes) more so in multifocal lenses. Intraocular lens implantation may be complicated by severe reaction to the lens (Toxic Lens Syndrome) or dislocation of the lens. The implanted lens may have to be respositioned or removed surgically if it is likely to damage the eye. Although every efforts is is made to minimize the chances of infection, it cannot be eleminated altogether and can be associated with loss of vision/eyeball which is a risk common to any intraocular surgery.
                                    </li>
                                    <li>
                                        Post cataract surgery vision may continue to improve for 2-4 weeks until healing is complete.
                                    </li>
                                    <li>
                                        It is possible that vision may drop after surgery due to thickening/opacification of the posterior capsule. This is not a complication but sequelaeto cataract extraction method. The condition is treated with the "YAG Laser".
                                    </li>
                                    <li>
                                        Although you may have opted for phacoemulsification surgery and the same may have been planned by your surgeon after pre-operative examination, if during surgery phacoemulsification is found to be unsafe or not feasible, your surgeon will have the liberty to perform surgery by the conventional technique in the interest of patient safety.
                                    </li>
                                    <li>
                                        Complications of surgery in general: as the procedure is generally done under local anaesthesia the risk to life is less than 0.5%. Risk is greater in patients with diabetes, hypertension, cardiac ailments and other systemic disorders and when surgery is performed under general anaesthesia. There is a possibility of drug reaction, brain damage or risk to life.
                                    </li>
                                    
                                </ol>
                                Since it is impossible to state every complication that may occur as a result of surgery, the list of complications in this form is not exhaustive. 
                            </li>
                        </ol>
                        <b class="weight:600;"> Consent for Operation:</b> <br>
                        <ol>
            
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            I hereby authorize Dr.......................................................................... and those whom he may designate as associates or assistant to perform cataract operation with an intraocular lens / without an intraocular lens / as a secondary procedure on my left/right eye. It has been explained to me that during the course of operation/ procedure, unforeseen conditions may be revealed or encountered which necessitate surgical or other procedures in addition to or different from those contemplated. 1, therefore, further request and authorize the above named physician/surgeon or his designates to perform such additional surgical or other procedures as he or they deem necessary or desirable
                            </li>
                            <li>
                                The nature and purpose of the operation the necessity thereof, the possible alternative methods of treatment of my condition have been fully explained to me and I understand the same.
                            </li>
                            <li>
                                I am fully aware that surgery is being performed in good faith and that no guarantee or assurance has been given as to the result that may be obtained.
                            </li>
                            <li>
                                I consent to the administration of anesthesia and to the use of such anesthetics as may be deemed necessary or desirable. 
                            </li>
                            <li>
                                I further consent to the administration of such drugs or infusions deemed necessary in the judgement of the medical staff.
                            </li>
                            <li>
                                I consent to the observing, photographing or televising of the procedure to be performed for medical, scientific or educational purposes, provided my identity is not revealed by the pictures or by descriptive text accompanying them. 
                            </li>
                            <li>
                                Any tissues or parts surgically removed may be disposed off by th institution in accordance with customary practice.
                            </li>
                        </ol>
                    </p>
                    <p>
                        I, the undersigned (the patient or nearest or nearest relative), hereby give my consent for the operation of left eye/right eye, with the full knowledge of possible complications and guarded / poor visual prognosis. I certify that I have read this informed consent / it has been read over to me and explained to me in my mother tongue and all blanks or statements requiring insertion or completion were filled in and any in applicable paragraphs stricken off before I signed. The doctor has answered all my questions to my satisfaction.
                    </p>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            Signature/Thumb Impression of the Patient <br/>
                            Name: <br/>
                            Date: <br/>

                        </div>
                        <div class="col-md-6">
                            Signature/Thumb Impression of the Patient's attender <br/>
                            Name: <br/>
                            Date: <br/>
                        </div>
                    </div>
                    <br><br>
                    <b class="weight:600;"> Declaration by Doctor:</b> <br/>
                
                    <p> 
                    I declare that I have explained the nature and consequence of the procedure to be performed, and discussed the risks that particularly concern the patient. <br/>

                    I have given the patient an opportunity to ask questions and I have answered these.
                    </p>
                    <br>

                    <p>
                        Doctor's Signature: <br/>
                        Doctors's Name: <?php echo $result1['surgeon_name'] ;?><br/>
                        Date & Time: <?php echo $result1['surgery_date'] ;?> <br/>
                    </p>
                </div>
           </div>
<div class="print-area" style="display:none;">
<div class="row">  
<div class="col-md-12">
                <?php if (!empty($print_details[0]['print_header'])) { ?>
                        <div class="pprinta4">
                            <img src="https://rajanclinic.com/uploads/printing/pre_1.jpeg" class="img-responsive" style="height:100px; width: 100%;">
                            <?php
                            // if (!empty($print_details[0]['print_header']))
                            {
                                // echo base_url() . $print_details[0]['print_header'].img_time();
                            }
                            ?>
                            
                        </div>
                    <?php } ?>
           <div class="card mt-1">
                <div class="card-body"> 
                    <div class="row">
                        <?php 
                            $currency_symbol = $this->customlib->getHospitalCurrencyFormat();
                        ?> 
                <div class="box-body pb0">                   
                    <div class="col-md-12 col-lg-10 col-sm-9">  
                        
                <div class="">
                    <table width="100%" class="noborder_table" style="margin: 0px;">
                        <tr>
                            <th width="25%"><?php echo $this->lang->line('case_id'); ?></th>
                            <td width="25%"><?php echo $case_id;?></td>
                            <th width="25%"><?php echo $this->lang->line('ipd'); ?></th>
                            <td width="25%"><?php echo $ipd_id; ?></td>
                        </tr>
                        <tr>
                            <th width="25%"><?php echo $this->lang->line('name'); ?></th>
                            <td width="25%"><?php echo composePatientName($result1['patient_name'],$result1['patient_id']);?></td>
                            <th width="25%"><?php echo $this->lang->line('phone'); ?></th>
                            <td width="25%"><?php echo $result1['mobileno']; ?></td>
                        </tr>
                        
                        <tr>
                           
                            <th  width="25%"><?php echo $this->lang->line('age'); ?></th>
                            <td  width="25%">
                                <?php
                                if (!empty($result1['dob'])) {
                                    echo $this->customlib->getAgeBydob($result1['dob']);
                                } 
                                ?>   
                            </td>
                            <th width="25%"><?php echo $this->lang->line('address'); ?></th>
                            <td  width="25%"><?php echo $result1['address']; ?></td>
                                                  
                    </tr>
                    <tr>
                           
                            <?php 
                        if($result['opdid']!='' && $result['opdid']!=0){ ?>                
                            <th  width="25%"><?php echo $this->lang->line('opd_no'); ?></th>
                            <td  width="25%"><?php
                                if($result['opdid']!='' && $result['opdid']!=0){
                                    echo $this->customlib->getSessionPrefixByType('opd_no').$result['opdid'];
                                }                                   
                                ?>
                            </td>                                   
                        <?php }  
                        if($result['ipdid']!='' && $result['ipdid']!=0){?>                     
                            <th  width="25%"><?php echo $this->lang->line('ipd_no'); ?></th>
                            <td  width="25%"><?php
                                if($result['ipdid']!='' && $result['ipdid']!=0){
                                    echo $this->customlib->getSessionPrefixByType('ipd_no').$result['ipdid'];
                                }                                            
                                ?>
                            </td>                                   
                        <?php } ?>             
                           
                    </tr>
                    </table>
                <hr style="height: 1px; clear: both;" />

                    <h3 class="text-center text-uppercase" style="padding: 0px;margin:0px;">Patient consent </h3>
                </div>
              
                          </div>           
                        </div>
                    </div>                   
                </div>
            </div>
              <p>
            <?php
            if (!empty($print_details[0]['print_footer'])) {
                echo $print_details[0]['print_footer'];
            }
            ?>                          
            </p> 
        </div>
    </div>
</div>