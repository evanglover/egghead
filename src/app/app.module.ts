import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule }    from '@angular/common/http';
import { ReactiveFormsModule } from '@angular/forms';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
//https://github.com/Gbuomprisco/ngx-chips

import { AppComponent } from './app.component';
import { ApiCheckerComponent } from './api-checker/api-checker.component';
import { AppRoutingModule } from './/app-routing.module';
import { HomeNavComponent } from './home-nav/home-nav.component';
import { NavbarComponent } from './navbar/navbar.component';
import { FooterComponent } from './footer/footer.component';
import { WordsComponent } from './words/words.component';
import { WordComponent } from './word/word.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { AccountWordsComponent } from './account-words/account-words.component';
import { RegisterComponent } from './register/register.component';
import { LoginComponent } from './login/login.component';

@NgModule({
  declarations: [
    AppComponent,
    ApiCheckerComponent,
    HomeNavComponent,
    NavbarComponent,
    FooterComponent,
    WordsComponent,
    WordComponent,
    DashboardComponent,
    AccountWordsComponent,
    RegisterComponent,
    LoginComponent
  ],
  imports: [
  	NgbModule.forRoot(),
    BrowserModule,
    HttpClientModule,
    ReactiveFormsModule,
    BrowserAnimationsModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
