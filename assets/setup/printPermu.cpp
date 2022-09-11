#include <iostream>
using namespace std;

int main(int argc, char const *argv[])
{
    string seed = "MZNXBCVLAKSJDHFGTYURIEOPWQ";
    string prmu = "43245";
    int p1, p2, p3, p4, p5;
    for (int i = 0; i < 600; i++)
    {
        bool startReached = false, endReached = false;

        p1 = rand() % 26;
        p2 = rand() % 26;
        p3 = rand() % 26;
        p4 = rand() % 26;
        p5 = rand() % 26;
        if (p1 != p2 && p2 != p3 && p3 != p4 && p4 != p5)
        {
            prmu[0] = seed[p1];
            prmu[1] = seed[p2];
            prmu[2] = seed[p3];
            prmu[3] = seed[p4];
            prmu[4] = seed[p5];
        }

        // while (p1 < seed.length())
        // {

        //     // if (startReached)
        //     // {
        //     //     p2++;
        //     // }
        //     // if (endReached)
        //     // {
        //     //     p2--;
        //     // }

        //     // if (p2 == 0)
        //     // {
        //     //     startReached = true;
        //     //     endReached = false;
        //     // }
        //     // if (p2 == seed.length())
        //     // {
        //     //     endReached = true;
        //     //     startReached = false;
        //     // }
        //     // p1++;
        //     // p3--;
        // }
        // cout << p1 << " " << p2 << " " << p3 << " " << p4 << " " << p5 << endl;

        cout << prmu << endl;
    }
    return 0;
}
