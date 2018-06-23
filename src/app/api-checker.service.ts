import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { Observable, of } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable({
  providedIn: 'root'
})
export class ApiCheckerService {
  private apiUrl = '/api/word';

  constructor(
  	private http: HttpClient
  	) { }

  getApiCheck(){
  	return this.http.get(this.apiUrl);
  }
}
