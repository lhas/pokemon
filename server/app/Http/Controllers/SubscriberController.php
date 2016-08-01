<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class SubscriberController extends CrudController{

    public function all($entity){
        parent::all($entity); 

			$this->filter = \DataFilter::source(new \App\Subscriber);
			$this->filter->add('name', 'Name', 'text');
			$this->filter->add('sex', 'Sexo', 'select')->options(['' => 'Sexo', 'masculino' => 'Masculino', 'feminino' => 'Feminino']);
			$this->filter->add('localization', 'Localização', 'text');
			$this->filter->add('email', 'E-mail', 'text');
			$this->filter->add('date_of_birth', 'Data de aniversário', 'text');
			$this->filter->add('team', 'Time', 'select')->options(['' => 'Time', 'mystic' => 'Mystic', 'instinct' => 'Instinct', 'valor' => 'Valor']);
			$this->filter->submit('Pesquisar');
			$this->filter->reset('Resetar');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('name', 'Name');
			$this->grid->add('sex', 'Sexo');
			$this->grid->add('localization', 'Localização');
			$this->grid->add('email', 'E-mail');
			$this->grid->add('date_of_birth', 'Data de aniversário');
			$this->grid->add('team', 'Time');
			$this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        /* Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
	
			$this->edit = \DataEdit::source(new \App\Subscriber());

			$this->edit->label('Edit Subscriber');

			$this->edit->add('name', 'Name', 'text');
		
			$this->edit->add('code', 'Code', 'text')->rule('required');


        */
       
        return $this->returnEditView();
    }    
}
