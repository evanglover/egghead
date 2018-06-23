import { Component, Input, OnChanges } from '@angular/core';
import { FormArray, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { Observable } from 'rxjs';

import { User } from '../user';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnChanges {
	@Input() user: User;

	message: string;
	factions: string[];
	registerForm: FormGroup;

  constructor(
  	private auth: AuthService,
  	private fb: FormBuilder
  	) {
  		this.getFactions();
  		this.createForm();
  	 }

  getFactions(){
  	this.auth.getFactions()
  		.subscribe(result => this.factions = result);
  }

  createForm() {
  	this.registerForm = this.fb.group({
  		email: ['', [Validators.required, Validators.email]],
  		nickname: ['', Validators.required],
  		faction: ['', Validators.required],
  		description: '',
  		password: ['', Validators.required],
  		verifyPassword: ['', Validators.required]
  	},
  	{ updateOn: 'touch' });
  }

  ngOnChanges(){
  	this.rebuildForm();
  }

  rebuildForm(){
  	this.registerForm.reset({

  	});
  }

  revert() { this.rebuildForm(); }

  onSubmit(){
  	if(this.registerForm.valid){
	  	this.auth.register(this.registerForm.value)
	  		.subscribe(function(response){
	  			console.log(response);
	  		});
	}
  }

  // Form getters
  get email() { return this.registerForm.get('email'); }
  get nickname() { return this.registerForm.get('nickname'); }
  get faction() { return this.registerForm.get('faction'); }
  get description() { return this.registerForm.get('description'); }
  get password() { return this.registerForm.get('password'); }
  get verifyPassword() { return this.registerForm.get('verifyPassword'); }

}
