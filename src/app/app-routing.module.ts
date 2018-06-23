import { NgModule }             from '@angular/core';
import { NgbModule } 				from '@ng-bootstrap/ng-bootstrap';
import { RouterModule, Routes } from '@angular/router';

// Public
import { HomeNavComponent } from './home-nav/home-nav.component';
import { WordsComponent }   from './words/words.component';
import { WordComponent } from './word/word.component';

import { RegisterComponent } from './register/register.component';
import { LoginComponent } from './login/login.component';

// Private
import { AuthGuardService } from './auth-guard.service';
import { DashboardComponent } from './dashboard/dashboard.component';
import { AccountWordsComponent } from './account-words/account-words.component';

const routes: Routes = [
  { path: '', component: HomeNavComponent },
  // words
  { path: 'words', component: WordsComponent },
  { path: 'words/:id', component: WordComponent },
  // decks

  // account
  { path: 'register', component: RegisterComponent },
  { path: 'login', component: LoginComponent },
  {
  	//private
  	path: 'account',
  	component: DashboardComponent,
  	canActivate: [AuthGuardService],
  	children: [
  		{
	  		path:'',
	  		canActivateChild: [AuthGuardService],
	  		children: [
	  			// words
	  			{ path: 'words', component: AccountWordsComponent }
	  			// decks

	  			//settings
	  		]
	  	}
  	]
  }
];

@NgModule({
  imports: [ RouterModule.forRoot(routes), NgbModule ],
  exports: [ RouterModule ]
})
export class AppRoutingModule {}