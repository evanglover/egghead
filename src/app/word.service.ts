import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { Observable, of } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';

import { Word } from './word';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable({
  providedIn: 'root'
})
export class WordService {
  private apiUrl = '/api';

  constructor(
  	private http: HttpClient
  	) { }

  getApiResult(term){
  	return this.http.get(`${this.apiUrl}`);
  }

  /** GET one word from id */
  getWord(id): Observable<any>{
  	return this.http.get(`${this.apiUrl}/word?id=${id}`);
  }

  /** GET all the words */
  getWords(){
  	return this.http.get(`${this.apiUrl}/words`);
  }

  /** GET a random word */
  getRandomWord(){
	return this.http.get(`${this.apiUrl}/word/random`)
  }

  /* GET words whose term contains search term */
  searchWords(term: string): Observable<any> {
    if (!term.trim()) {
      // if not search term, return empty word array.
      return of([]);
    }
    return this.http.get(`${this.apiUrl}/words?term=${term}`);
  }


}