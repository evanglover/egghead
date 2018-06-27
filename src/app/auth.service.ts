import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { Observable, of } from 'rxjs';
import { catchError, map, tap, debounceTime, distinctUntilChanged } from 'rxjs/operators';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private apiUrl = '/api';

  constructor(
  	private http: HttpClient
  	) { }

  isLoggedIn(){
  	if (sessionStorage.getItem('userInfo')) {
        // logged in so return true
        return true;
    }
    // user is not logged in
    return false;
  }

  login(email, password){
  	return this.http.put<any>(`${this.apiUrl}/auth`, {email: email, password: password})
  		.pipe(map(response => {
                // login successful if there's a token in the response
                if (response.user) {
                    // store user details and token in session storage to keep user logged in between page refreshes
                    sessionStorage.setItem('userInfo', JSON.stringify(response.user));
                    return response.user;
                } else {
                	return response.message;
             	}
            }));
  }

  register(formValues){
  	var formData = new FormData();
  	Object.keys(formValues).forEach(function(key) {
  		if(key != "verifyPassword")
	  		formData.append(key, formValues[key]);
	});
  	console.log(formData);
  	return this.http.post<any>(`${this.apiUrl}/register`,formData)
  		.pipe(map(response => {
                // response will either be true or false and a message
                return response;
            }));
  }

  getFactions(): Observable<any>{
  	return this.http.get<any>(`${this.apiUrl}/user/factions`);
  }

  checkEmail(email: string): Observable<any>{
    var formData = new FormData();
    formData.append('email', email);
    return this.http.put<any>(`${this.apiUrl}/user/checkEmail`, formData);
  }

  checkNickanme(nickname: string): Observable<any>{
    var formData = new FormData();
    formData.append('nickname', nickname);
    return this.http.put<any>(`${this.apiUrl}/user/checkNickname`, formData);
  }

  logout(){
        sessionStorage.removeItem('userInfo');
    }

}
