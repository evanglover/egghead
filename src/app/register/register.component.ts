import { Component, Input, OnChanges } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
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
      this.createForm();
  		this.getFactions();
  	 }

  getFactions(){
  	this.auth.getFactions()
  		.subscribe(result => this.factions = result);
  }

  createForm() {
  	this.registerForm = this.fb.group({
  		email: ['', [Validators.required, Validators.email], this.serverEmailValidator.bind(this)],
  		nickname: ['', Validators.required, this.serverNicknameValidator],
  		faction: ['', Validators.required],
  		description: '',
  		password: ['', Validators.required],
  		verifyPassword: ['', [Validators.required,this.passwordMatchValidator('password')]]
  	});
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

  // custom validators
  private emailTimeout;
  private lastEmailVal;
  serverEmailValidator() {
    return function (c: FormControl) {
      if(this.emailTimeout)
        clearTimeout(this.emailTimeout);
      return new Promise(resolve => {
        if(this.lastEmailVal && c.value != this.lastEmailVal){
          this.lastEmailVal = c.value;
          this.emailTimeout = setTimeout(() => {
            var result = this.auth.checkEmail(c.value);
            console.log(result);
            if(result.success){
              resolve(null);
            } else {
              if(result.message == "invalid email"){
                 resolve({'invalidEmail': true});
              } else if(result.message == "user already exists") {
                 resolve({'userexists': true});
              } else {
                resolve(null);
              }
            }
          }, 300);
        }
      });
    }
  }

  // custom validators
  private nicknameTimeout;
  private lastnicknameVal;
  serverNicknameValidator() {
    return function (c: FormControl) {
      if(this.nicknameTimeout)
        clearTimeout(this.nicknameTimeout);
      if(this.lastEmailVal && c.value != this.lastNicknameVal){
        this.lastNicknameVal = c.value;
        this.emailTimeout = setTimeout(() => {
          var result = this.auth.checkNickname(c.value);
          if(result.success){
            return null;
          } else {
            if(result.message == "nickname is taken") {
               return {'nicknameTaken': true};
            } else {
              return null;
            }
          }
        }, 300);
      }
    }
  }

  // custom validators
  passwordMatchValidator(ocs: string) {
	  return function (c: FormControl) {
      if(c.parent){
        var oc = c.parent.get(ocs) as FormControl;
        return oc.value === c.value ? null : {'mismatch': true};
      } else {
        return null;
      }
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
