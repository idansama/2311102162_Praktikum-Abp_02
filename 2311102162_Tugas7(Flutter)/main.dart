import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Tugas Widget Flutter',
      home: const HomePage(),
    );
  }
}

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  final List<String> buah = const [
    'Apel',
    'Mangga',
    'Jeruk',
    'Pisang',
    'Anggur',
  ];

  final List<String> menu = const [
    'Home',
    'Profile',
    'Settings',
    'Logout',
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Tugas Praktikum Modul Flutter'),
        backgroundColor: Colors.blue,
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text(
              '1. Container',
              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),
            Container(
              width: double.infinity,
              height: 80,
              margin: const EdgeInsets.only(top: 10, bottom: 20),
              decoration: BoxDecoration(
                color: Colors.orange,
                borderRadius: BorderRadius.circular(12),
              ),
              child: const Center(
                child: Text(
                  'Ini adalah Container berwarna',
                  style: TextStyle(color: Colors.white, fontSize: 18),
                ),
              ),
            ),

            const Text(
              '2. GridView',
              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),
            GridView.count(
              crossAxisCount: 3,
              shrinkWrap: true,
              physics: const NeverScrollableScrollPhysics(),
              crossAxisSpacing: 10,
              mainAxisSpacing: 10,
              children: List.generate(6, (index) {
                return Container(
                  decoration: BoxDecoration(
                    color: Colors.blueAccent,
                    borderRadius: BorderRadius.circular(10),
                  ),
                  child: Center(
                    child: Text(
                      'Item ${index + 1}',
                      style: const TextStyle(color: Colors.white),
                    ),
                  ),
                );
              }),
            ),

            const SizedBox(height: 20),

            const Text(
              '3. ListView',
              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),
            SizedBox(
              height: 150,
              child: ListView(
                children: const [
                  ListTile(
                    leading: Icon(Icons.looks_one),
                    title: Text('Item A'),
                  ),
                  ListTile(
                    leading: Icon(Icons.looks_two),
                    title: Text('Item B'),
                  ),
                  ListTile(
                    leading: Icon(Icons.looks_3),
                    title: Text('Item C'),
                  ),
                ],
              ),
            ),

            const Text(
              '4. ListView.builder',
              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),
            SizedBox(
              height: 230,
              child: ListView.builder(
                itemCount: buah.length,
                itemBuilder: (context, index) {
                  return Card(
                    child: ListTile(
                      leading: const Icon(Icons.favorite),
                      title: Text(buah[index]),
                    ),
                  );
                },
              ),
            ),

            const Text(
              '5. ListView.separated',
              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),
            SizedBox(
              height: 220,
              child: ListView.separated(
                itemCount: menu.length,
                itemBuilder: (context, index) {
                  return ListTile(
                    leading: const Icon(Icons.menu),
                    title: Text(menu[index]),
                  );
                },
                separatorBuilder: (context, index) {
                  return const Divider(
                    thickness: 1,
                    color: Colors.grey,
                  );
                },
              ),
            ),

            const Text(
              '6. Stack',
              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),
            Container(
              width: double.infinity,
              height: 150,
              margin: const EdgeInsets.only(top: 10),
              child: Stack(
                children: [
                  Container(
                    width: double.infinity,
                    height: 150,
                    decoration: BoxDecoration(
                      color: Colors.purple,
                      borderRadius: BorderRadius.circular(15),
                    ),
                  ),
                  const Positioned(
                    top: 50,
                    left: 40,
                    child: Text(
                      'Teks di atas kotak',
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 24,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}