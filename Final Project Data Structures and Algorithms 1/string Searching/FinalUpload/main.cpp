//Code has been used from lectures week 7 to print out where it was found and load in the files to be searched 
//Code from geekforgeek.com has been used as a basis for understanding the rabin karp algorithm but has been altered and changed for personal project as it required different setup 

#include <cassert>
#include <iostream>
#include <fstream>
#include <list>
#include <string>
#include <chrono>
#include "utils.h"

using std::cout;
using std::endl;
using std::list;
using std::string;
using std::chrono::duration_cast;
using std::chrono::microseconds;
typedef std::chrono::steady_clock the_clock;

//A list has been used for both of these algorithms


list<Position> find_bm_multi(const string& pat, const string& text) {
	Position pat_len = pat.size();
	Position text_len = text.size();
	list<Position> listMatch;

	//Sets up characters for algorithm so it knows which characters are in the pattern and which are not in the pattern
	int skip[256];
	for (int i = 0; i < 256; i++) {
		skip[i] = pat_len;
	}
	for (int i = 0; i < pat_len; i++) {
		skip[int(pat[i])] = (pat_len - 1) - i;

	}

	//compares to know how many to skip by
	for (Position i = 0; i < text_len - pat_len + 1; ++i) {
		int s = skip[int(text[i + pat_len - 1])];
		if (s != 0) {
			i += (s - 1); //this will skip forwards
			continue;
		}

		//Compares text to pattern to check for a match
		Position j;
		for (j = 0; j < pat_len; j++) {
			if (text[i + j] != pat[j]) {
				break; // Doesn't match here.
			}
		}
		if (j == pat_len) {
	
			listMatch.push_back(i);// Matched here. 
				
			
		}
	}
	if (listMatch.empty()) {
		cout << "Nothing was found\n";
		return listMatch; // Not found.
	}
	else {
		return listMatch;

	}


}

list <int> find_rk(string pat, string text, const int& prime) {



	int i, j;
	//sets the length of the pattern
	int Pat_Len = pat.length();
	//sets the length of the text
	int Text_Len = text.length();

	//sets up ready for a hash to be put here
	int Pattern_Hash = 0;
	//sets up ready for a hash to be put here
	int Text_Hash = 0;
	//Sets all characters for hashing
	int characters = 256;
	int h = 1;
	//Where all matches are going to be held
	list<int> listMatch;

	//Sets up variable h
	for (i = 0; i < Pat_Len - 1; i++)
		h = (h * characters) % prime;

	//hashes all of the letters in pattern and the starting characters of text hash for comparison
	for (i = 0; i < Pat_Len; i++) {

		Pattern_Hash = (characters * Pattern_Hash + pat[i]) % prime;
		Text_Hash = (characters * Text_Hash + text[i]) % prime;
	}
	//Begins comparing hashed characters from text and pattern for a match
	for (i = 0; i <= Text_Len - Pat_Len; i++) {

		if (Pattern_Hash == Text_Hash) {

			bool checker = true;

			for (j = 0; j < Pat_Len; j++) {
				if (text[i + j] != pat[j]) {

					checker = false;
					break;
				}
				
			}

			if (j == Pat_Len) { 

			listMatch.push_back(i);// Matched here. 
			}
		}
		//hashes next text characters to create a rolling hash which compares one by one until it reaches the end of the file
		if (i < Text_Len - Pat_Len) {

			Text_Hash = (characters * (Text_Hash - text[i] * h) + text[i + Pat_Len]) % prime;
			if (Text_Hash < 0) { Text_Hash = (Text_Hash + prime); }
		}

	}
	//returns the list of data when found or not found
	if (listMatch.empty()) {

		return listMatch; // Not found.
	}
	else {
		return listMatch;

	}

}


int main(int argc, char *argv[]) {
	
	int choice = 0;
	//Variables for BM-H algorithm
	string text;
	string pat = "www.yahoo.com";

	//change file for three different measurements
	load_file("web-log.txt", text);
	//load_file("long-web-log.txt", text);
	//load_file("long-web-log-random.txt", text);



	//Variables for the RK algorithm
	int primeNum = 181;


	//Choice for user to select which algorithm to use
	cout << "Enter 1 for Boyer-Moore Horspool or enter 2 for Rabin-Karp" << endl;
	std::cin >> choice;

	if (choice == 1) {

		std::ofstream myfile;
		myfile.open("resultsBM.csv");
		myfile << "time(ms), string size,\n";

		for (int i = 0; i < 1000; i++) {

			the_clock::time_point start = the_clock::now();
			list<Position> posBM = find_bm_multi(pat, text);
			the_clock::time_point end = the_clock::now();
			//when testing the timing comment out the printing section of each position below
			//takes longer since it is printing out the results
			for (int counter : posBM) {

				cout << "Found '" << pat << "' at position " << counter << ":\n";
				show_context(text, counter);


			}
			cout << endl << endl;

			auto time_taken = duration_cast<microseconds>(end - start).count();
			cout << "It took " << time_taken << " us.\n";

			

			
			myfile << time_taken << "," << text.length() << endl;
			
		}
		myfile.close();
	}

	else if (choice == 2) {
		//setting up writing to a excel file
		std::ofstream myfile;
		myfile.open("resultsRK.csv");
		myfile << "time(ms), string size,\n";
		for (int i = 0; i < 1000; i++) {
			//measurements
			the_clock::time_point start = the_clock::now();
			list<int> posRK = find_rk(pat, text, primeNum);
			the_clock::time_point end = the_clock::now();
			//for printing out data 

			for (int counter : posRK) {

				cout << "Found '" << pat << "' at position " << counter << ":\n";
				show_context(text, counter);


			}
			cout << endl << endl;

			auto time_taken = duration_cast<microseconds>(end - start).count();
			cout << "It took " << time_taken << " us.\n";

			

			
			myfile << time_taken << "," << text.length() << endl;
			
		}
		myfile.close();
	}

	
	
	system("pause");
	return 0;
}