import { Component, OnInit, Input } from '@angular/core';
import { Observable, Subject } from 'rxjs';
import { tap, map, filter, delay } from 'rxjs/operators';
import { ActivatedRoute } from '@angular/router';
import { Location } from '@angular/common';

import { 
	debounceTime, distinctUntilChanged, switchMap 
    } from 'rxjs/operators';

import { Word } from '../word';
import { WordService } from '../word.service';

@Component({
  selector: 'app-words',
  templateUrl: './words.component.html',
  styleUrls: ['./words.component.css']
})
export class WordsComponent implements OnInit {
  words$: Observable<any>;
  urlTerm: string;
  searching: boolean;
  private searchTerms = new Subject<string>();

  constructor(
  	private route: ActivatedRoute,
  	private wordService: WordService,
  	private location: Location
  	) {}

  // Push a search term into the observable stream.
  search(term: string): void {
    if(term.trim()){
  		this.searchTerms.next(term);
  		this.location.replaceState("/words?term=" + term);
  	}
  }

  ngOnInit(): void {
	this.route.queryParams.subscribe(params => {
        this.urlTerm = params.term;
    });

    this.words$ = this.searchTerms.pipe(
      // wait 300ms after each keystroke before considering the term
      debounceTime(300),

      // ignore new term if same as previous term
      distinctUntilChanged(),

      // switch to new search observable each time the term changes
      switchMap((term: string) => this.wordService.searchWords(term)),
    );
  }

  ngAfterViewInit(): void{
  	if(this.urlTerm){
  		this.searchTerms.next(this.urlTerm);
  	}
  }

  getApiResult(term): void{
  	this.wordService.getApiResult(term)
  	.subscribe(data => {
             console.log(data);
             }
         );
  }
}
