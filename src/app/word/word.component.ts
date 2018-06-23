import { Component, OnInit, Input } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Location } from '@angular/common';

import { Word } from '../word';
import { WordService } from '../word.service';


@Component({
  selector: 'app-word',
  templateUrl: './word.component.html',
  styleUrls: ['./word.component.css']
})
export class WordComponent implements OnInit {
  word: Observable<any>;
  found: boolean = true;

  constructor(
  	private route: ActivatedRoute,
  	private wordService: WordService,
  	private location: Location
  	) { }

  ngOnInit() {
  	this.getWord();
  }

  getWord(): void {
  	const id = this.route.snapshot.paramMap.get('id');
  	this.wordService.getWord(id)
  		.subscribe(word => {
  			if(word != false){
	  			this.found = true;
	  			this.word = word;
          console.log(word.session);
	  		} else {
	  			this.found = false;
	  		}
  		});
  }

}
