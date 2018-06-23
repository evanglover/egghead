import { Word } from './word';

export class User{
	id: string;
	email: string;
	nickname: string;
	faction: string;
	description: string;
	dateCreated: string;
	score: number;
	words: Word[];
	wordFavs: Word[];
}