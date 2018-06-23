import { User } from './user';

export class Word {
	id: string;
	user: User;
	term: string;
	wordClass: string;
	definition: string;
	origin: string;
	categories: string[];
	dateSubmitted: string;
	votes: number;
	// in reference to client user
	voted: number;
	favorited: boolean;
}