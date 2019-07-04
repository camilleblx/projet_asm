<?php
class participantcompetition extends config_genos {
    public $id;
    public $id_utilisateur;
    public $id_competition;
    public $presence;
 
    public function __construct (){
        parent::__construct();
		$this->id             = 0;
		$this->id_utilisateur = 0;
		$this->id_competition = 0;
		$this->presence = 0;
    } 

    // public static function ListeCompetitionParticipant(){
    //   $c = new competition;
    //   $req = "SELECT c.*
    //           FROM competition c
    //           ORDER BY c.nom ASC";
    //   $champs = $c->FieldList();
    //   $liste_competition = $c->StructList($req,$champs);
    //   foreach ($liste_competition as $key => $ligne) {
    //   	$liste_competition[$key]["liste_participant"] = array();
  	 //      $pc = new participantcompetition;
	   //    $req = "SELECT pc.*,u.nom,u.prenom
	   //            FROM participantcompetition pc
	   //            INNER JOIN utilisateur u ON u.id = pc.id_utilisateur
	   //            WHERE pc.id_competition = :id_competition";
	   //    $champs = $pc->FieldList();
	   //    $champs[] = "nom";
	   //    $champs[] = "prenom";
	   //    $binds = array("id_competition" => $ligne["id"]);
	   //    $liste_participant = $pc->StructList($req,$champs,$binds);
	   //    $liste_competition[$key]["liste_participant"] = $liste_participant;
    //   }
    //   return $liste_competition;
    // }  

    public static function CheckPresence($id_participantcompetition){
    	$pc = new participantcompetition;
    	$pc->id = $id_participantcompetition;
    	$pc->Load();
    	if($pc->presence == 1) $pc->presence = 0;
    	else $pc->presence = 1;
    	$pc->Update();
    }

    public static function TplModalListeParticipant(){ ?>
		<div class="modal fade" id="modal-liste-participant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Liste des participants</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
	            <table class="table mb-0">
	              <thead class="bg-light">
	                <tr>
	                  <th scope="col" class="border-0">#</th>
	                  <th scope="col" class="border-0">Nom</th>
	                  <th scope="col" class="border-0">Prenom</th>
	                  <th scope="col" class="border-0">Présence</th>
	                </tr>
	              </thead>
	              <tbody>
	                <tr v-for="participant in listeParticipantFiltre">
	                  <td>{{ ($index + 1) }}</td>
	                  <td>{{ participant.nom }}</td>
	                  <td>{{ participant.prenom }}</td>
	                  <td @click="CheckPresence(participant.id)"><input type="checkbox" v-model="participant.presence" ></td>
	                </tr>
	              </tbody>
	            </table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
		      </div>
		    </div>
		  </div>
		</div>
    <?php }

}