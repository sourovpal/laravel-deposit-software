 <!-- FAQ MODAL -->
 <div class="modal fade" id="FAQ" style="z-index: 99999999999999999999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Hybrid Theory</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="faq-content">
                     @foreach (\App\Models\Faq::where('id', 1)->get() as $faq)
                     <h3>{{ $faq->title }}</h3>
                     {!! $faq->content !!}
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </div>




 <!-- TERMS & CONDITION MODAL -->
 <div class="modal fade" id="TANDC" style="z-index: 99999999999999999999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Hybrid Theory</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="faq-content">
                     <h3>TERMS AND CONDITIONS</h3>
                     <h5>Rules and Regulations:</h5>
                     <p>(1) In order to reset your account, you must complete all data distribution.</p>
                     <p>(2) If you need to reset your account, you must contact Customer Services in order for this to be processed.</p>
                     <p>(3) To avoid any loss of funds, all withdrawals will be processed automatically by the system.</p>
                     <p>(4) The member's funds are secure within the platform and in the event of an accident, the platform will be responsible for the loss.</p>
                     <p>(5) Please do not share your account password and withdrawal password with others. The platform will not be held responsible for any loss.</p>
                     <p>(6) For your withdrawal password, it is recommended that do not set a birthday password, ID number or mobile phone number etc. It is recommended that you set a complex password to protect your funds.</p>
                     <p>(7) If you forget your account login password, you can contact Customer Service and request to change your login password in case you want to log in again.</p>
                     <p>(8) All data is randomly distributed by the system and therefore cannot be changed, cancelled, controlled or skipped in any way.</p>
                     <p>(9) As the platform has a lot of participants, it is not possible to manually split the combined data, so all combined data items are randomly distributed by the system.</p>
                     <p>(10) As each item is from a different vendor, for each deposit you must confirm the vendor's account details with customer service and ensure that your deposit is transferred within 15 minutes of obtaining the details.</p>
                     <p>(11) If you are unable to make a deposit within 15 minutes of obtaining the vendor details, you must contact Customer Services to obtain latest details.</p>
                     <h5>(12) FOREIGN OUTWARD REMITTANCE</h5>
                     <p>If the vendor you are dealing with is from overseas, an exchange rate deposit is required in advance for all transactions over $25,000 or equivalent.</p>
                     <p>If the vendor you are dealing with is from overseas, an exchange rate deposit is required in advance for all transactions over $25,000 or equivalent.</p>
                     <p>* Minimum amount per transaction - $100 or equivalent</p>
                     <p>* Maximum amount per transaction - $25,000 or equivalent</p>
                     <p>(13) The platform will not be held responsible for any funds deposited into the wrong account.</p>
                     <p>(14) Members are required to complete each data within four hours and will be liable for breach of contract if they fail to notify the vendor of the requested extension, resulting in a complaint from the vendor.</p>
                     <p>(15) Each violation of company rules, is detrimental to company's reputation, and harassment of customer service for delays or irrelevant information will affect credit score deduction, and a credit score below 95 will affect the ensuing withdrawal process.</p>
                     <p>(16) If the credit score is below 95, there will be a refundable deposit of 37% of the current balance.</p>
                     <p>(17) Members need to have a credit score of 98 or above to make a withdrawal. You can contact Customer Service to pay a refundable deposit to increase your credit score This deposit is refundable.</p>
                     <p>(18) There is a limited withdrawal limit for each membership level. If you wish to withdraw more than the limit, you must upgrade your membership.</p>
                     <ul>
                         <li>Bronze: 10,000 USDT</li>
                         <li>Silver: 15,000 USDT</li>
                         <li>Gold: 20,000 USDT</li>
                         <li>Platinum: 25,000 USDT and above</li>
                     </ul>
                     <p>If the withdrawal amount exceeds the current membership level of the account, the member is required to deposit and upgrade to the corresponding membership level in order to get approval from the platform and financial department.</p>
                     <p>The deposit for upgrading one membership level is 8,000 USDT. All the deposits made will be able to be returned to the linked wallet address with the withdrawal amount after the required deposit for upgrading.</p>
                     <hr>
                     <p>In order to resolve a complaint regarding the Site or to receive further information regarding use of the Site, please contact us at:</p>
                     <h5>LADDER DIGITAL LIMITED</h5>
                     <h5>727-729 HIGH ROAD, LONDON, ENGLAND, N12 0BP</h5>
                     <h5>United Kingdom</h5>
                     <h5></h5>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <!-- CERTIFICATE MODAL -->
 <div class="modal fade" id="Certificate" style="z-index: 99999999999999999999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Hybrid Theory</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <h3>Certificate</h3>
                @foreach (\App\Models\Certificate::where('id', 1)->get() as $certificate)
                    <div class="faq-content">
                        <img src="{{ asset('/frontend/images/certificate/'.$certificate->file) }}" width="100%" alt="Certificate">
                    </div>
                @endforeach                
             </div>
         </div>
     </div>
 </div>
 <!-- CONTRACT MODAL -->
 <div class="modal fade" id="Contract" style="z-index: 99999999999999999999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hybrid Theory</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
            <div class="modal-body">
                <h3>Contract</h3>
                @foreach (\App\Models\Contract::where('id', 1)->get() as $contract)
                    <div class="faq-content">
                        <img src="{{ asset('/frontend/images/contract/'.$contract->file) }}" width="100%" alt="Contract">
                    </div>
                @endforeach                
            </div>
      </div>
  </div>
</div>
 <!-- EVENT MODAL -->
 <div class="modal fade" id="Event" style="z-index: 99999999999999999999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hybrid Theory</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
                <h3>Event</h3>
                @foreach (\App\Models\Event::where('id', 1)->get() as $event)
                    <div class="faq-content">
                        <img src="{{ asset('/frontend/images/event/'.$event->file) }}" width="100%" alt="Event">
                    </div>
                @endforeach
          </div>
      </div>
  </div>
</div>
